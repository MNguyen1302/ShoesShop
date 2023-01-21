function logout() {
    localStorage.removeItem('loggedin');
    window.location = 'index.html';
}

window.onload = function() {
    const sidebarItem = document.querySelectorAll('.sidebar-item');
    const contents = document.querySelectorAll('.block-content');
    const dropdownUser = document.querySelector('.dropdown-user');
    const userButton = document.querySelector('#username');

    sidebarItem.forEach((sidebar, index) => {
        sidebar.onclick = function() {
            const content = contents[index];

            document.querySelector('.block-content.active').classList.remove('active');
            document.querySelector('.sidebar-item.active').classList.remove('active');

            this.classList.add('active');
            content.classList.add('active');
        }
    })

    window.onclick = (e) => {
        if (!dropdownUser) return;
    }

    if (userButton) userButton.onclick = () => {
        dropdownUser.classList.toggle('show');
    }

}

function formattedDate(date) {
    let year = date.getFullYear();

    let month = (1 + date.getMonth()).toString();
    month = month.length > 1 ? month : '0' + month;

    let day = date.getDate().toString();
    day = month.length > 1 ? day : '0' + day;

    return year + '-' + month + '-' + day;
}

function formattedPrice(price) {
    price = price.replaceAll('.', "");
    return parseFloat(price);
}

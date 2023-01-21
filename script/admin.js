const formPost = document.querySelector('.form-post');

function updateParamPage(page) {
    const url = new URL(window.location.href);
    url.searchParams.delete('id');
    url.searchParams.set('page', page);
    window.location = url.href;
}

function addProduct(e) {
    e.preventDefault();

    let name = document.getElementById('name').value;
    let price = document.getElementById('price').value;
    let brand = document.getElementById('brand').value;
    let description = document.getElementById('description').value;
    let image = document.getElementById('image').value;

    let id = Math.floor(new Date().valueOf() * Math.random());

    if(!name || !price || !brand || !description || !image) {
        addAlert("One field is required");
        return;
    }

    if(isNaN(price)) {
        addAlert("Value of price field is not valid");
        return;
    }

    formPost.submit();
}

function deleteProduct() {
    const deleteBtn = document.querySelectorAll('.btn-delete');
    const deletePopup = document.querySelectorAll('.popup-delete-post');
    const noBtn = document.querySelectorAll('.btn-no');
    const yesBtn = document.querySelectorAll('.btn-yes');

    deleteBtn.forEach((item, index) => {
        item.onclick = function() {
            deletePopup[index].classList.toggle('show');

            noBtn[index].onclick = () => deletePopup[index].classList.toggle('show');

            yesBtn[index].onclick = function() {
                const productId = this.getAttribute('data-id');

                window.location.href = `?action=deleteProduct&id=${productId}`;
            }
        }
    })
}

function updateProduct() {
    const editBtn = document.querySelectorAll('.btn-edit');
    const editForm = document.querySelector('.admin-popup');

    editBtn.forEach((item) => {
        item.onclick = function() {
            const id = this.getAttribute('data-id');

            window.location.href = `?id=${id}`;
            editForm.classList.toggle('show');
        }
    })
}

function showEditPost(product) {
    const editForm = document.querySelector('.admin-popup');

    editForm.innerHTML = `<div class="edit-product-form">
        <form class="form-edit" id="${product.id}" method="post" action="?action=updateProduct&id=${product.productId}&image=${product.image}">
            <div class="btn-close" onclick="togglePopupEdit()">
                <i class="ri-close-line"></i>
            </div>
            <div class="admin-post-input">
                <div class="admin-post-title">Post</div>
                <label for="name">Product Name</label>
                <input type="text" id="new_name" name="name" value="${product.name}">
            </div>
            <div class="admin-post-input">
                <label for="price">Price</label>
                <input type="text" id="new_price" name="price" value="${formattedPrice(product.price)}">
            </div>
            <div class="admin-post-input">
                <label>Product Image</label>
                <input onchange="handleImage('new_previewImg', 'new_image')" id="new_image" type="file" name="image">
                <img onclick="openFile('new_previewImg', 'new_image')" src="../images/${product.image}" alt="${product.name}" id="new_previewImg">
            </div>
            <div class="admin-post-input">
                <label for="brand">Brand</label>
                <select name="brand" id="new_brand" class="admin-input-select">
                    <option value="none" hidden selected disabled>Choose type brand</option>
                    <option value="converse">Converse</option>
                    <option value="nike">Nike</option>
                    <option value="adidas">Adidas</option>
                    <option value="vans">Vans</option>
                </select>
            </div>
            <div class="admin-post-input">
                <label for="description">Description</label>
                <textarea name="description" class="description" id="new_description" cols="30" rows="10">${product.description}</textarea>
            </div>
            <div class="btn-post">
                <button type="submit" id="btn-edit">Save</button>
            </div>
        </form>
    </div>`

    document.querySelector('#new_brand').value = product.brand;
    editForm.classList.toggle('show');
}

function handleImage(previewImg, filename) {
    const image = document.getElementById(filename);
    const preview = document.getElementById(previewImg);

    image.onchange = function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            const base64String = reader.result;

            preview.src = base64String;
        }
        reader.readAsDataURL(file);
    }
}

function openFile(previewImg, filename) {
    const image = document.getElementById(filename);
    const preview = document.getElementById(previewImg);

    preview.onclick = () => {
        image.click();
    }
}

function togglePopupEdit() {
    document.querySelector('.admin-popup').classList.toggle('show');
}

function togglePopupDelete() {
    document.querySelector('.popup-delete-post').classList.toggle('show');
}

deleteProduct();
updateProduct();

openFile('previewImg', 'image');
handleImage('previewImg', 'image');

formPost?.addEventListener('submit', addProduct);

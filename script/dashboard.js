let [fromYear, fromMonth, fromDay] = document.getElementById('from-date').value.split('-'),
    [toYear, toMonth, toDay] = document.getElementById('to-date').value.split('-');

function updateDate() {
    [fromYear, fromMonth, fromDay] = document.getElementById('from-date').value.split('-');
    [toYear, toMonth, toDay] = document.getElementById('to-date').value.split('-');
}

function checkDate(date1, date2, date3) {
    return (
        (new Date(`${date1[0]}-${date1[1]}-${date1[2]}`) >= new Date(`${date2[0]}-${date2[1]}-${date2[2]}`)) &&
        (new Date(`${date1[0]}-${date1[1]}-${date1[2]}`) <= new Date(`${date3[0]}-${date3[1]}-${date3[2]}`))
    );
}

function totalSalesInMonth() {
    const orderList = JSON.parse(localStorage.getItem('bills'));

    let totalSalesInMonth = 0;
    let quantityInMonth = 0;

    orderList.forEach(order => {
        if(order.status) {
            const [day, month, year] = order.orderDate.split('/');

            if (checkDate([year, month, day], [fromYear, fromMonth, fromDay], [toYear, toMonth, toDay])) {
                totalSalesInMonth += formattedPrice(order.totalPrice);
                order.products.forEach(product => quantityInMonth += product.quantity);
            }
        }
    });

    return [
        totalSalesInMonth.toLocaleString('vi', {style: 'currency', currency: 'VND'}),
        quantityInMonth,
    ];
}
function totalSalesPerBrand() {
    const orderList = JSON.parse(localStorage.getItem('bills'));
    const brands = ['nike', 'adidas', 'vans', 'converse'];

    let sum;

    let totalSalesPerBrand = {
        'nike': '',
        'adidas': '',
        'vans': '',
        'converse': ''
    }

    for(let i in brands) {
        sum = 0;
        orderList.forEach(order => {
            if(order.status) {
                const [day, month, year] = order.orderDate.split('/');

                if (checkDate([year, month, day], [fromYear, fromMonth, fromDay], [toYear, toMonth, toDay])) {
                    order.products.forEach(product => {
                        if(product.brand === brands[i])
                            sum += formattedPrice(product.price) * product.quantity;
                    });
                }
            }
        })
        totalSalesPerBrand[brands[i]] = sum;
    }
    return totalSalesPerBrand;
}
function quantityPerBrand() {
    const orderList = JSON.parse(localStorage.getItem('bills'));
    const brands = ['nike', 'adidas', 'vans', 'converse'];

    let count = 0;

    let quantityPerBrand = {
        'nike': 0,
        'adidas': 0,
        'vans': 0,
        'converse': 0
    }

    for(let i in brands) {
        count = 0;
        orderList.forEach(order => {
            if(order.status) {
                const [day, month, year] = order.orderDate.split('/');

                if (checkDate([year, month, day], [fromYear, fromMonth, fromDay], [toYear, toMonth, toDay])) {
                    order.products.forEach(product => {
                        if(product.brand === brands[i])
                            count += product.quantity;
                    });
                }
            }
        })
        quantityPerBrand[brands[i]] = count;
    }
    return quantityPerBrand;
}

function displayTableOfBrand() {
    const table = document.querySelector('.dashboard-table');

    let html = '', index = 1;
    let total = totalSalesPerBrand();
    let quantity = quantityPerBrand();

    for(let key in total) {
        html += `
            <tr>
                <td style="text-align: center;">${index++}</td>
                <td style="text-transform: capitalize;">${key}</td>
                <td style="text-transform: none;">${total[key].toLocaleString('vi', {style: 'currency', currency: 'VND'})}</td>
                <td>${quantity[key]}</td>
            </tr>
        `
    }
    table.innerHTML = html;
}

function displayTotalSales() {
    const totalInMonth = document.querySelector('.total-in-month');
    const qtyInMonth = document.querySelector('#qty-inmonth');
    const inmonth = document.querySelector('#inmonth');
    const totalSales = document.querySelector('#totalSales');

    let arr = totalSalesInMonth();

    inmonth.innerText = `From ${fromDay}/${fromMonth}/${fromYear} to ${toDay}/${toMonth}/${toYear}`;
    totalSales.innerText = `Total sales of each brand product from ${fromDay}/${fromMonth}/${fromYear} to ${toDay}/${toMonth}/${toYear}`;

    totalInMonth.innerText = arr[0];
    qtyInMonth.innerText = arr[1];
}

document.getElementById('from-date').onchange = () => {
    updateDate();
    displayTableOfBrand();
    totalSalesInMonth();
    totalSalesPerBrand();
    displayTotalSales();
    if (new Date(`${fromYear}-${fromMonth}-${fromDay}`) > new Date(`${toYear}-${toMonth}-${toDay}`)) {
        toastr.warning('Please select a valid date');
    }
}

document.getElementById('to-date').onchange = () => {
    updateDate();
    displayTableOfBrand();
    totalSalesInMonth();
    totalSalesPerBrand();
    displayTotalSales();
    if (new Date(`${fromYear}-${fromMonth}-${fromDay}`) > new Date(`${toYear}-${toMonth}-${toDay}`)) {
        toastr.warning('Please select a valid date');
    }
}

displayTableOfBrand();
totalSalesInMonth();
totalSalesPerBrand();
displayTotalSales();

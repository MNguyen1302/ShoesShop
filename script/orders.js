function displayViewCheckout(user) {
    const viewOrder = document.querySelector('.checkout-product');
    if(viewOrder) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        cart = cart.filter(item => item.userId == user.id);

        let html = '';
        let price = 0, totalPrice = 0;
        cart.forEach(product => {
            price = parseInt(product.quantity) * formattedPrice(product.price);
            totalPrice += price;
            html += `<tr>
                <td>${product.name} x ${product.quantity}</td>
                <td>${price.toLocaleString('vi', {style: 'currency', currency: 'VND'})}</td>
            </tr>`
        });
        html += `<tr>
            <td>Total: </td>
            <td>${totalPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'})}</td>
        </tr>`
        viewOrder.innerHTML = html;
    }

}

function order(e, user) {
    e.preventDefault();
    const formOrder = document.getElementById('form-order');
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;

    if(!phone || !address) {
        addAlert('One field is required');
        return;
    }
    if(!(phone.length === 10) || isNaN(phone)) {
        addAlert('Phone number is not valid');
        return;
    }

    let carts = JSON.parse(localStorage.getItem('cart'));
    let cart = carts.filter(cart => cart.userId == user.id);

    const id = Math.floor(new Date().valueOf() * Math.random());

    let orderDetails = [];
    let totalPrice = 0;

    cart.forEach(item => {
        totalPrice += parseInt(item.quantity) * formattedPrice(item.price);
        orderDetails.push({
            orderId: id.toString(),
            productId: item.id,
            quantity: parseInt(item.quantity),
            price: formattedPrice(item.price)
        })
    })

    const order = {
        id: id.toString(),
        customerId: user.id,
        address: address,
        phone: phone,
        status: false,
        subtotal: totalPrice,
        orderDate: formattedDate(new Date()),
    }

    $.ajax({
        type: 'POST',
        url: '../controllers/order.php',
        data: order,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                window.location = '../views/order.php';
                let cart = carts.filter(cart => cart.userId != user.id);
                localStorage.setItem('cart', JSON.stringify(cart));
            }
            else addAlert(response.message);
        },
        error: (error) => {
            console.log(JSON.stringify(error));
       }
    });

    $.ajax({
        type: 'POST',
        url: '../controllers/order_detail.php',
        data: { orderDetails: JSON.stringify(orderDetails) },
        dataType: 'json',
        success: function(response) {
            if (!response.success) addAlert(response.message);
        },
        error: (error) => {
            console.log(JSON.stringify(error));
       }
    });
}

function displayOrderDetail(orderId) {
    location.reload();
    window.location.href = `?orderId=${orderId}`;
}

function showOrderedDetail(order, products) {
    const viewBtn = document.querySelectorAll('.btn-view');
    const popup = document.querySelector('.admin-popup');

    popup.innerHTML = `
        <div class="ordered-container">
            <div class="ordered-wrapper">
                <div class="btn-close" onclick="togglePopupEdit()">
                    <i class="ri-close-line"></i>
                </div>
                <div class="ordered-heading">Ordered #${order.id}</div>
                <div class="ordered-block">
                    <div class="ordered-title">
                        <i class="ri-map-pin-line"></i>
                        <span>Address</span>
                    </div>
                    <div class="ordered-info">
                        <span>${order.phone}</span>
                        <span>${order.address}</span>
                    </div>
                </div>
                <div class="ordered-block">
                    <div class="ordered-title">
                        <i class="ri-information-line"></i>
                        <span>Information</span>
                    </div>
                    <div class="ordered-product-wrapper"></div>
                </div>
                <div class="ordered-total-price">
                    <span>Total Price: </span>
                    <span>${order.subtotal} đ</span>
                </div>
            </div>
        </div>
    `;

    products.forEach(product => {
        document.querySelector('.ordered-product-wrapper').innerHTML += `
            <div class="ordered-product">
                <img src="../images/${product.image}" alt="${product.name}" class="ordered-item-image">
                <div class="ordered-item-info">
                    <span>${product.name}</span>
                    <span>${product.quantity} x ${product.price} đ</span>
                </div>
            </div>
        `
    })
    popup.classList.toggle('show');

}

function togglePopupEdit() {
    document.querySelector('.admin-popup').classList.toggle('show');
}

const closeBtn = document.querySelector('.btn-close');

function displayDetail(productId) {
    const url = new URL(window.location.href);
    url.searchParams.set('id', productId);
    window.location = url.href;
}

function updateParamPage(page) {
    const url = new URL(window.location.href);
    url.searchParams.delete('id');
    url.searchParams.set('page', page);
    window.location = url.href;
}

function displayCart() {
    const loggedin = JSON.parse(localStorage.getItem('loggedin'));
    const customers = JSON.parse(localStorage.getItem('user'));
    const cartPopup = document.querySelector('.cart-popup');
    const cartTotal = document.querySelector('.cart-total');
    const cartWrapper = document.querySelector('.cart-wrapper');
    const cartNoItem = document.querySelector('.cart-noItem');
    const cartButton = document.querySelector('.cart-button');

    if(!loggedin) {
        cartPopup.innerHTML = '<div>Please login to view cart</div>';
        return;
    }

    const user = customers.find(customer => customer.id === loggedin.id);
    let totalPrice = 0;
    if(!user.cart.length) {
        cartTotal.style.display = 'none';
        cartWrapper.style.display = 'none';
        cartButton.style.display = 'none';
        cartNoItem.style.display = 'block';
        return;
    }

    cartTotal.style.display = 'flex';
    cartWrapper.style.display = 'block';
    cartButton.style.display = 'block';
    cartNoItem.style.display = 'none';

    let html = '';
    user.cart.forEach(cart => {
        html += `
            <div class="cart-item">
                <img src="${cart.image}" alt="${cart.name}" class="cart-item-image">
                <div class="cart-item-info">
                    <span>${cart.name}</span>
                    <span>${cart.count} x ${cart.price} ₫</span>
                </div>
                <button onclick="removeFromCart(${cart.id})" class="delete-cart" data-id="${cart.id}"><i class="ri-delete-bin-line"></i></button>
            </div>`
        totalPrice += (cart.count * formattedPrice(cart.price));
    });

    cartWrapper.innerHTML = html;

    cartTotal.innerHTML = `
        <span>TOTAL: </span>
        <div class="total-horizontal"></div>
        <span>${totalPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'})}</span>
    `;
}

function closePopup() {
    document.body.style.overflow = 'initial';
    document.querySelector('.product-popup').style.display = 'none';
}

function addCountToCart(char, id) {
    let quantity = document.querySelector(".input-quantity");
    if (char == '-') {
        if(quantity.value == 1) return;
        if (quantity.value > 0) quantity.value = Number(quantity.value) - 1;
    }
    else if (char == '+') {
        quantity.value = Number(quantity.value) + 1;
    }
    else {
        const loggedin = JSON.parse(localStorage.getItem('loggedin'));
        quantity = Number(quantity.value);

        if(!loggedin) {
            addAlert("Please login first to add to cart");
            return;
        }

        if (quantity <= 0 ) return;

        const product = state.products().find(product => product.id == id);
        const customers = JSON.parse(localStorage.getItem('user'));
        const index = customers.findIndex(customer => customer.id == loggedin.id);

        const indexProduct = customers[index].cart.findIndex(item => item.id == product.id);

        if (indexProduct != -1)
            customers[index].cart[indexProduct].count += quantity;
        else
            customers[index].cart.push({
                id: product.id,
                name: product.name,
                image: product.image,
                price: product.price,
                count: quantity,
                brand: product.brand,
            });
        localStorage.setItem('user', JSON.stringify(customers));
        addAlert("Add to cart successfully", "success");
        displayCart();
    }
}

function addToCart(user, _product) {
    if (!user) {
        addAlert("Please login first to add to cart");
        return;
    }
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const index = cart.findIndex(item => item.id == _product.productId);

    if (index != -1) {
        cart[index].quantity++;
    } else {
        cart.push({
            id: _product.productId,
            userId: user.id,
            name: _product.name,
            image: _product.image,
            price: _product.price,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    addAlert("Add to cart successfully", "success");
    console.log(user);
    displayCart(user);
}

function removeFromCart(id) {
    const loggedin = JSON.parse(localStorage.getItem('loggedin'));

    if(loggedin) {
        const customers = JSON.parse(localStorage.getItem('user'));
        const index = customers.findIndex(customer => customer.id == loggedin.id);

        customers[index].cart = customers[index].cart.filter(cart => cart.id != id);

        localStorage.setItem('user', JSON.stringify(customers));
        displayCart();
    }
}

function searchByBrand(brand) {
    if (brand === 'all') {
        window.location = 'product.php';
        return;
    }

    window.location.href = `product.php?action=getByBrand&brand=${brand}`;
}

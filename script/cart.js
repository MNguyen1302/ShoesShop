function displayCart(user) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    const cartPopup = document.querySelector('.cart-popup');
    const cartTotal = document.querySelector('.cart-total');
    const cartWrapper = document.querySelector('.cart-wrapper');
    const cartNoItem = document.querySelector('.cart-noItem');
    const cartButton = document.querySelector('.cart-button');

    if(!user) {
        cartPopup.innerHTML = '<div>Please login to view cart</div>';
        return;
    }

    let totalPrice = 0;

    cart = cart.filter(item => item.userId == user.id);

    if(!cart.length) {
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

    user = JSON.stringify(user);

    cart.forEach(item => {
        html += `
            <div class="cart-item">
                <img src="../images/${item.image}" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-info">
                    <span>${item.name}</span>
                    <span>${item.quantity} x ${item.price} ₫</span>
                </div>
                <button onclick="removeFromCart('${encodeURIComponent(user)}', '${item.id}')" class="delete-cart" data-id="${item.id}"><i class="ri-delete-bin-line"></i></button>
            </div>`
        totalPrice += (item.quantity * formattedPrice(item.price));
    });

    cartWrapper.innerHTML = html;

    cartTotal.innerHTML = `
        <span>TOTAL: </span>
        <div class="total-horizontal"></div>
        <span>${totalPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'})}</span>
    `;
}

function displayViewCart(user) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    const viewcartTable = document.querySelector('.viewcart-product');
    const btnCheckout = document.querySelector('.button-checkout');

    if(!user) {
        viewcartTable.innerHTML = `<tr>
            <td colspan="6" height="50px" style="text-align: center;">Please login to view cart</td>
        </tr>`;
        return;
    }

    cart = cart.filter(item => item.userId == user.id);

    let html = '';
    if(cart) {
        if(cart.length) {
            cart.forEach((product, index) => {
                html += `<tr id="${product.id}">
                    <td class="td-image">
                        <img src="../images/${product.image}" alt="">
                    </td>
                    <td>${product.name}</td>
                    <td>${product.price} ₫</td>
                    <td>
                        <form class="cart">
                            <div class="quantity buttons-added">
                                <button type="button" class="minus" onclick="minusQty(${product.id})">
                                    <i class="ri-subtract-fill"></i>
                                </button>
                                <input type="number" id="quantity-${product.id}" class="input-quantity" step="1" min="1" max name="quantity" value=${product.quantity}>
                                <button type="button" class="plus" onclick="plusQty(${product.id})">
                                    <i class="ri-add-fill"></i>
                                </button>
                            </div>
                        </form>
                    </td>
                    <td>${(parseInt(product.quantity) * formattedPrice(product.price)).toLocaleString('vi', {style: 'currency', currency: 'VND'})}</td>
                    <td class="td-action">
                        <button class="btn-delete" onclick="togglePopupDelete()">
                            <i class="ri-delete-bin-6-line"></i>
                        </button>
                        <div class="popup-delete-post">
                            <div class="delete-popup-content">
                                Do you want to delete this product?
                            </div>
                            <div class="btn-choose">
                                <button class="btn-yes" data-id="${product.id}">Yes</button>
                                <button class="btn-no">No</button>
                            </div>
                        </div>
                    </td>
                </tr>`
            });
        } else {
            html += `<tr>
                <td colspan="10" style="text-align: center;">You have no product in cart, please select product <a href="product.html">here</a></td>
            </tr>`
            btnCheckout.style.pointerEvents = 'none';
            btnCheckout.style.opacity = 0.6;
        }
        viewcartTable.innerHTML = html;
    }
}

function addCountToCart(char, product, user) {
    let quantity = document.querySelector(".input-quantity");
    if (char == '-') {
        if (quantity.value > 0) quantity.value = Number(quantity.value) - 1;
    }
    else if (char == '+') {
        quantity.value = Number(quantity.value) + 1;
    }
    else {
        const loggedin = JSON.parse(localStorage.getItem('loggedin'));
        quantity = Number(quantity.value);

        if(!user) {
            addAlert("Please login first to add to cart");
            return;
        }

        if (quantity <= 0) return;

        const carts = JSON.parse(localStorage.getItem('cart'));
        const indexProduct = carts.findIndex(cart => cart.id == product.productId && cart.userId == user.id);

        if (indexProduct != -1)
            carts[indexProduct].quantity += quantity;
        else
            carts.push({
                id: product.productId,
                name: product.name,
                image: product.image,
                price: product.price,
                quantity: quantity,
                userId: user.id
            });

        localStorage.setItem('cart', JSON.stringify(carts));
        addAlert("Add to cart successfully", "success");
        displayCart(user);
    }
}

function removeFromCart(user, id) {
    user = JSON.parse(decodeURIComponent(user));
    if(user) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        cart = cart.filter(item => item.userId == user.id && item.id != id);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart(user);
        displayViewCart(user);
    }
}

function minusQty(id) {
    const quantity = document.getElementById("quantity-" + id);
    const btnUpdate = document.querySelector(".button-update");

    if (quantity.value == 1) return;
    quantity.value = Number(quantity.value) - 1;
    btnUpdate.disabled = false;
    btnUpdate.style.opacity = 1
}

function plusQty(id) {
    const quantity = document.getElementById("quantity-" + id);
    const btnUpdate = document.querySelector(".button-update");

    quantity.value = Number(quantity.value) + 1;
    btnUpdate.disabled = false;
    btnUpdate.style.opacity = 1;
}

function updateCart(user) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    cart = cart.filter(item => item.userId == user.id);

    cart.forEach(product => {
        let quantity = document.getElementById("quantity-" + product.id);
        product.quantity = quantity.value;
    })

    localStorage.setItem('cart', JSON.stringify(cart));
    window.location.reload();
}

function removeFromViewCart(user) {
    const deleteBtn = document.querySelectorAll('.btn-delete');
    const deletePopup = document.querySelectorAll('.popup-delete-post');
    const noBtn = document.querySelectorAll('.btn-no');
    const yesBtn = document.querySelectorAll('.btn-yes');

    deleteBtn.forEach((item, index) => {
        item.onclick = function() {
            deletePopup[index].classList.toggle('show');

            noBtn[index].onclick = () => deletePopup[index].classList.toggle('show');

            yesBtn[index].onclick = function() {
                const id = this.getAttribute('data-id');
                let cart = JSON.parse(localStorage.getItem('cart'));
                cart = cart.filter(item => item.id != user.id && item.id != id);

                localStorage.setItem('cart', JSON.stringify(cart));
                window.location.reload();
            }
        }
    })
}

function totalPrice(user) {
    const viewcartPrice = document.querySelector('.viewcart-price');
    let totalPrice = 0;

    let cart = JSON.parse(localStorage.getItem('cart'));
    cart = cart.filter(item => item.userId == user.id);

    cart.forEach(product => {
        totalPrice += parseInt(product.quantity) * formattedPrice(product.price);
    })
    if(viewcartPrice)
        viewcartPrice.innerHTML = "Total: " + totalPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'});
    return totalPrice;
}

function togglePopupDelete() {
    document.querySelector('.popup-delete-post').classList.toggle('show');
}

removeFromViewCart();

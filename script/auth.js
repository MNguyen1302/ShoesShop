const formLogin = document.querySelector('#form-login');
const formRegister = document.querySelector('#form-register');

function register(e) {
    e.preventDefault();

    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPass = document.getElementById('confirmpassword').value;
    const address = document.getElementById('address').value;
    const regex = /\S+@\S+\.\S+/;

    if(!fullname || !email || !password || !address) {
        addAlert('One field is required');
        return;
    }

    if(!regex.test(email)) {
        addAlert('Email is not valid');
        return;
    }

    if(password !== confirmPass) {
        addAlert('Password is not matching');
        return;
    }

    formRegister.submit();
}

function login(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    let regex = /\S+@\S+\.\S+/;

    if (!email || !password) {
        addAlert('One field is required');
        return;
    }

    if(!regex.test(email)) {
        addAlert('Email is not valid');
        return;
    }

    formLogin.submit();
}

formLogin?.addEventListener('submit', login);
formRegister?.addEventListener('submit', register);

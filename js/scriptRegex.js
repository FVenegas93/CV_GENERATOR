const form = document.getElementById('form');
const inputs = document.querySelectorAll('.form-control');

const regexps = {
    username: /^\w{6,20}$/gm,
    passwd: /^\w{6,16}$/gm,
    email: /^\w+(@{1})(yahoo|hotmail|gmail|outlook)(\.)(com|org|es)$/gm,
    name: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    surname1: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    surname2: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    nif: /^[0-9]{8}[A-Z]{1}$/gm,
    address: /^(C\/){1}[A-ZÀ-ÿa-z\u00f1\u00d1]+\,[0-9]+$/gm,
    country: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    region: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    city: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm,
    phone: /^[679]{1}[0-9]{8}$/gm
}

const validateForm = (e) => {
    switch (e.target.name) {
        case "username":
            if(regexps.username.test(e.target.value)) {
                document.getElementById('floatingInput1').classList.remove('invalid-form');
                document.getElementById('floatingInput1').classList.add('valid-form');
            }else {
                document.getElementById('floatingInput1').classList.remove('valid-form');
                document.getElementById('floatingInput1').classList.add('invalid-form');
            }
        break;
        case "passwd":

        break;
        case "repeat_passwd":

        break;
        case "email":

        break;
        case "first_name":

        break;
        case "first_surname":

        break;
        case "second_surname":

        break;
        case "nif":

        break;
        case "address":

        break;
        case "country":

        break;
        case "region":

        break;
        case "city":

        break;
        case "phone":

        break;
        case "privacy_policy":

        break;

    }
}

inputs.forEach((input) => { 
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
});
form.addEventListener('submit', (event) => {
    event.preventDefault();
});






//SUBMIT BUTTON 
var btn = document.getElementById('submit');

//FORM
var form = document.getElementById('form');

const url = "http://localhost/CV_GENERATOR/php/Controllers/CreateUser.php";

var user_exists = document.getElementById('username_exists').innerHTML;

//INPUTS
var username = document.getElementById('floatingInput1');
var passwd = document.getElementById('floatingInput2');
var passwd2 = document.getElementById('floatingInput3');
var email = document.getElementById('floatingInput4');
var firstname =  document.getElementById('floatingInput5');
var surname1 = document.getElementById('floatingInput6');
var nif = document.getElementById('floatingInput7');
var phone = document.getElementById('floatingInput8');
var privacy = document.getElementById('floatingInput9');

//A BUNCH OF INPUTS WHICH WILL HAVE AN EVENT FOR THEMSELVES
const inputs = document.querySelectorAll(".form-control");

//AN OBJECT WHICH HAS ALL THE REGEXPS NEEDED TO VALIDATE THE FORM
const regexps = {
    username: /^\w{6,14}$/,
    passwd: /^\w{6,16}$/,
    email: /^\w+(@{1})(yahoo|hotmail|gmail|outlook)(\.)(com|org|es)$/,
    name: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    surname1: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    surname2: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    nif: /^[0-9]{8}[A-Z]{1}$/,
    address: /^(C\/){1}[A-ZÀ-ÿa-z\u00f1\u00d1]+\,[0-9]+$/,
    country: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    region: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    city: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    phone: /^[679]{1}[0-9]{8}$/
}

//AN OBJECT FULL OF BOOLEANS THAT WILL CONTROL IF FORM SUBMITS OR NOT
const bools = {
    username: false,
    passwd: false,
    passwd2: false,
    email: false,
    firstname: false, 
    surname1: false,
    nif: false,
    phone: false,
    policy: false,
    username_available: false,
}


/*
This arrow function validates an input changing its CSS class and returns a boolean 
reg = regexp as a parameter
inp = input as a parameter
value = the value of the aforementioned input as a parameter
*/
const validateInput = (reg, inp, value) => {
    if(reg.test(value)) {
        inp.classList.remove('invalid-input');
        inp.classList.add('valid-input');
        
        return true;
    }else {
        inp.classList.remove('valid-input');
        inp.classList.add('invalid-input');
        
        return false;
    }
}

/*
This arrow function validates a form according to the targeted input. If the targeted input returns true, its respective
bool will be true and its error-box will be empty, else the bool will be false and its error-box will notice the user of 
the correspondent mistake.
e = event recieved as a parameter
*/
const validateForm = (e) => {
    switch (e.target.name) {
        case "username":
            if(validateInput(regexps.username, username, username.value)) {
                document.getElementById('wrong1').innerHTML = "";
                bools.username = true;
            }else {
                bools.username = false;
                if(username.value == "" || username.value == null ) {
                    document.getElementById('wrong1').innerHTML = "Este campo no puede estar vacío";
                }else if(username.value.length < 6 || username.value.length > 14) {
                    document.getElementById('wrong1').innerHTML = "Introduzca entre 6 y 14 caracteres";
                }else {
                    document.getElementById('wrong1').innerHTML = "No se permiten caracteres especiales";
                }
            }

            console.log("username" + bools.username);
            
        break;
        case "passwd":
            if(validateInput(regexps.passwd, passwd, passwd.value)) {
                document.getElementById('wrong2').innerHTML = "";
                bools.passwd = true;
            }else {
                bools.passwd = false;
                if(passwd.value == "" || passwd.value == null ) {
                    document.getElementById('wrong2').innerHTML = "Este campo no puede estar vacío";
                }else if(passwd.value.length < 6 || passwd.value.length > 14) {
                    document.getElementById('wrong2').innerHTML = "Introduzca entre 6 y 14 caracteres";
                }else {
                    document.getElementById('wrong2').innerHTML = "No se permiten caracteres especiales";
                }
            }

            console.log("passwd" + bools.passwd);
        break;
        case "repeat_passwd":
            validatePassword2(btn);
        break;
        case "email":
            if(validateInput(regexps.email, email, email.value)) {
                document.getElementById('wrong4').innerHTML = "";
                bools.email = true;
            }else {
                bools.email = false;
                if(email.value == "" || email.value == null) {
                    document.getElementById('wrong4').innerHTML = "Este campo no puede estar vacío";
                }else {
                    document.getElementById('wrong4').innerHTML = "El email no es válido";
                }
            }

        break;
        case "first_name":
            if(validateInput(regexps.name, firstname, firstname.value)) {
                document.getElementById('wrong5').innerHTML = "";
                bools.firstname = true;
            }else {
                bools.firstname = false;
                if(firstname.value == "" || firstname.value == null ) {
                    document.getElementById('wrong5').innerHTML = "Este campo no puede estar vacío";
                }else {
                    document.getElementById('wrong5').innerHTML = "No se permiten caracteres especiales";
                }
            }

        break;
        case "first_surname":
            if(validateInput(regexps.surname1, surname1, surname1.value)) {
                document.getElementById('wrong6').innerHTML = "";
                bools.surname1 = true;
            }else {
                bools.surname1 = false;
                if(surname1.value == "" || surname1.value == null) {
                    document.getElementById('wrong6').innerHTML = "Este campo no puede estar vacío";
                }else {
                    document.getElementById('wrong6').innerHTML = "No se permiten caracteres especiales";
                }
            }

        break;
        case "nif":
            if(validateInput(regexps.nif, nif, nif.value)) {
                document.getElementById('wrong7').innerHTML = "";
                bools.nif = true;
            }else {
                bools.nif = false;
                if(nif.value == "" || nif.value == null) {
                    document.getElementById('wrong7').innerHTML = "Este campo no puede estar vacío";
                }else if(nif.value.length != 9) {
                    document.getElementById('wrong7').innerHTML = "La longitud del NIF no es correcta";
                }else {
                    document.getElementById('wrong7').innerHTML = "El NIF no es válido";
                }
            }

        break;
        case "phone":
            if(validateInput(regexps.phone, phone, phone.value, btn)) {
                document.getElementById('wrong8').innerHTML = "";
                bools.phone = true;
            }else {
                bools.phone = false;
                if(phone.value == "" || phone.value == null) {
                    document.getElementById('wrong8').innerHTML = "Este campo no puede estar vacío";
                }else if(phone.value.length != 9) {
                    document.getElementById('wrong8').innerHTML = "La longitud del número no es correcta";
                }else {
                    document.getElementById('wrong8').innerHTML = "El teléfono no es válido";
                }
            }

        break;
        case "privacy_policy":
            validateCheckbox();
        break;
    }
}

/*
this arrow function validates the repeat password input. It changes the input class, its respective bool
and the content of its error-box. The function also returns its own boolean and does not recieve any parameter
*/
const validatePassword2 = () => {
    if(passwd.value !== passwd2.value) {
        passwd2.classList.remove('valid-input');
        passwd2.classList.add('invalid-input');
        bools['passwd2'] = false;
        document.getElementById('wrong3').innerHTML = "Las contraseñas no coinciden";
        return false;
    }else {
        passwd2.classList.remove('invalid-input');
        passwd2.classList.add('valid-input');
        bools['passwd2'] = true;
        document.getElementById('wrong3').innerHTML = "";
        return true;
    }
}


/*
this arrow function validates whether the privacy policy checkbox is checked or not. If the checkbox
is checked its respective bool will be true and will return also a true boolean, else, both the bool and 
the return will be false. No parameters recieved.
*/
const validateCheckbox = () => {
    if(privacy.checked) {
        bools['policy'] = true;
        return true;
    }else {
        bools['policy'] = false;
        return false;
    }
}

/*
For each input an event validates the input whenever the selected input is not the one which recieves the aforementioned event
*/
inputs.forEach((input) => {
    input.addEventListener('blur', validateForm);
});



username.addEventListener('blur', function(){
    var user = $(this).val();
    var dataString = 'username='+user;

    $.ajax({
        type:'POST',
        url:'../Controllers/UsernameAvailability.php',
        data: dataString,
        success:function(data){
            $('#username_exists').fadeIn(500).html(data); 
            $.ajax({
                type:'GET',
                url: '../../json/bool.json',
                success:function(data) {
                    if(data == false) {
                        bools.username_available = false;
                    }else {
                        bools.username_available = true;
                    }
                }
            });
        }
    });
});



/*
An event which listens if the privacy policy checkbox is checked or not.
*/
privacy.addEventListener("click", validateCheckbox);

/*
An event for the form which prevents the event whenever one of the bools is false. On the other hand, if all the bools are true,
an AJAX Request is done and the form is sent to the server, and then, to the database.
*/
window.addEventListener("load", function(e) {
    form.action = url;
    ajax_resp = document.getElementsByClassName('ajax-resp');
    
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if(bools.username && bools.passwd && bools.passwd2 && bools.email 
            && bools.firstname && bools.surname1 && bools.nif && bools.phone && bools.policy && bools.username_available) {
                
                use_XHR(form, ajax_resp);
            }

    });
});


function use_XHR(fo, response) {
    let xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", function() {
        if(this.readyState == 4 && this.status == 200) {
            response.innerHTML = this.responseText;
            window.location.href = "http://localhost/CV_GENERATOR/php/Views/Redirect.php";
        }else {
            response.innerHTML = 
            `
            <p>AJAX request state: ${this.readyState}</p>
            <p>Server request state: ${this.statusText} - ${this.status}</p>
            `
        }
    });

    xhr.open(fo.method, fo.action, true);

    let formData = new FormData(fo);
    console.log(formData);
    xhr.send(formData);

}

//VARIABLES
var btn = document.getElementById('btn');
var form_cvname = document.getElementById('rename-form');
var div_wrong = document.getElementById('wrong-name');
var input = document.getElementById('name-cv');

var name_cv_bool = false;

//REGEXP FOR CV NAME
const name_cv_regexp = /^\w{6,14}$/;

//URLS AND PARAM FOR AN URL WITH PARAMETERS
const urlCreate = "http://localhost/CV_GENERATOR/php/Controllers/RenameCVForm.php";
const url = "http://localhost/CV_GENERATOR/php/Controllers/RenameCVForm.php?cod_cv=";
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const param = urlParams.get('cod_cv');
const urlUpdate = url+param;

//THIS ARROW FUNCTION CHECKS IF THE WRITTEN VALUE IS CORRECT*/
const validateCVName = (reg, inp, val, bool) => {
    if(reg.test(val)) {
        inp.classList.remove('invalid-input');
        inp.classList.add('valid-input');
        bool = true;
        console.log(bool);
        var currentURL = window.location.href;
        console.log(currentURL);
        return true;
    }else {
        inp.classList.remove('valid-input');
        inp.classList.add('invalid-input');
        bool = false;
        console.log(bool);
        var currentURL = window.location.href;
        console.log(currentURL);
        return false;
    }

    
}

/*
THIS ARROW FUNCTION WRITES A COMMENT IF THE FORM IS NOT PROPERLY FILLED
*/
const validForm = (e) => {
    if(validateCVName(name_cv_regexp, input, input.value, name_cv_bool)) {
        name_cv_bool = true;
        document.getElementById('wrong-name').innerHTML = "";
    }else{
        
        name_cv_bool = false;
        if(input.value == "" || input.value == null ) {
            document.getElementById('wrong-name').innerHTML = "Este campo no puede estar vacío";
        }else if(input.value.length < 6 || input.value.length > 14) {
            document.getElementById('wrong-name').innerHTML = "Introduzca entre 6 y 14 caracteres";
        }else {
            document.getElementById('wrong-name').innerHTML = "No se permiten caracteres especiales";
        }
    }
}

// BLUR EVENT ASSOCIATED TO THE VARIABLE INPUT
input.addEventListener('blur', validForm);

//DEPENDING OF THE CURRENT URL THE LOCATION WILL BE FOR CREATING A CV OR RENAMING IT
window.addEventListener("load", function(e) {
    var currentURL = window.location.href;
    if(currentURL == urlCreate) {
        form_cvname.action = urlCreate;
    }else {
        form_cvname.action = urlUpdate;
    }
   
    ajax_resp = document.getElementsByClassName('ajax-resp');

    //SUBMIT EVENT ASSOCIATED TO THE FORM
    form_cvname.addEventListener('submit',(e) => {
        e.preventDefault();
        
        if(name_cv_bool) {
            use_XHRR(form_cvname, ajax_resp);
            
        }  
     
    });
});

//AJAX REQUEEST INSIDE A FUNCTION WHICH REDIRECTS THE USER TO THE CV LIST
function use_XHRR(fo, response) {
    let xhrr = new XMLHttpRequest();

    xhrr.addEventListener("readystatechange", function() {
        if(this.readyState == 4 && this.status == 200) {
            response.innerHTML = this.responseText;
            window.location.href = "http://localhost/CV_GENERATOR/php/Views/CVsList.php";
        }else {
            response.innerHTML = 
            `
            <p>AJAX request state: ${this.readyState}</p>
            <p>Server request state: ${this.statusText} - ${this.status}</p>
            `
        }
    });

    xhrr.open(fo.method, fo.action, true);

    let formData = new FormData(fo);
    console.log(formData);
    xhrr.send(formData);

}
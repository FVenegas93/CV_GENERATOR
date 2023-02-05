//THIS SCRIPT PROBABLY IS NOT REFERENCED IN ANY ARCHIVE BUT I GOT NO TIME
//TO EXPLORE IF IS TRUE OR NOT SO HERE IT WILL STAY NOT TO BROKE ANYTHING LOL

var btn_lang = document.getElementById('btn-lang');
var select_lang = document.getElementById('select-lang');
var lvl_lang = document.getElementById('lvl-lang');
var form_lang = document.getElementById('lang-form');

//OBTENER URL CON PARÁMETROS $_GET
const url = "http://localhost/CV_GENERATOR/php/Views/CVData.php?cod_cv=";
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const param = urlParams.get('cod_cv');
const currentURL = url+param;

//AJAX
window.addEventListener("load", function(e) {
    e.preventDefault();
    form_lang.action = currentURL;
    ajax_resp = document.getElementsByClassName('ajax-resp');
   
    form_lang.addEventListener('submit', (e) => {
        $.ajax({
            type:"POST",
            url: currentURL,
            data: form_lang.serialize(),
            
        }).done(function(data) {
            alert("BUEN IDIOMA");
        });
        
        
        
    });
});


//FORM AS A VARIABLE 
var title_form = document.getElementById('title-form');

//SUBMIT EVENT ASSOCIATED TO THE FORM WHICH SEND THE DATA TO THE CONTROLLER
window.addEventListener("load", function (e) {
    title_form.action = currentURL;
    ajax_resp = document.getElementsByClassName('ajax-resp');

    title_form.addEventListener('submit', (e) => {
        $.ajax({
            type:"POST",
            url: currentURL,
            data: title_lang.serialize(),
            success: function(data) {
                alert('Formación creada');
            }
        });
        e.preventDefault();
    });
});


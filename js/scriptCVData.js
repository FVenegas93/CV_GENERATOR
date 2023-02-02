//PARTE ASOCIADA AL FORMULARIO DE IDIOMAS

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


//PARTE ASOCIADA AL FORMULARIO DE TÍTULOS
var title_form = document.getElementById('title-form');

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


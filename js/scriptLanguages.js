var btn_lang = document.getElementById('btn-lang');
var select_lang = document.getElementById('select-lang');
var lvl_lang = document.getElementById('lvl-lang');
var form_lang = document.getElementById('lang-form');

const url = "http://localhost/CV_GENERATOR/php/Views/CVData.php?cod_cv=";
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const param = urlParams.get('cod_cv');
const currentURL = url+param;

window.addEventListener("load", function(e) {
    form_lang.action = currentURL;
    ajax_resp = document.getElementsByClassName('ajax-resp');
    
    form_lang.addEventListener('submit', (e) => {
        $.ajax({
            type:"POST",
            url: currentURL,
            data: form_lang.serialize(),
            success: function(data) {
                alert('Idioma creado');
            }
        });
        e.preventDefault();
    });
});


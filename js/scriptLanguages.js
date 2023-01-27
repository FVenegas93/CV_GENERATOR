var btn_lang = document.getElementById('btn-lang');
var user = document.getElementById('user').value;
var select_lang = document.getElementById('select-lang');
var lvl_lang = document.getElementById('lvl-lang');
console.log(user);

btn_lang.addEventListener('click', function() {
    var selectedOption = select_lang.options[select_lang.selectedIndex].value;
    var selectedOption2 = lvl_lang.options[lvl_lang.selectedIndex].value;
    console.log(selectedOption);
    console.log(selectedOption2);
});
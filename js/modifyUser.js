//INPUTS
var firstname =  document.getElementById('floatingInput5');
var surname1 = document.getElementById('floatingInput6');
var nif = document.getElementById('floatingInput7');

var select = document.getElementById('input1');
var select2 = document.getElementById('input2');
var select3 = document.getElementById('input3');
var address = document.getElementById('input4');

//FORM
var update_user_form = document.getElementById('update-user-form');

//A BUNCH OF INPUTS WHICH WILL HAVE AN EVENT FOR THEMSELVES
const inputs = document.querySelectorAll(".form-control");

//AN OBJECT WHICH HAS ALL THE REGEXPS NEEDED TO VALIDATE THE FORM
const regexps = {
    name: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    surname1: /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/,
    nif: /^[0-9]{8}[A-Z]{1}$/
}

//AN OBJECT FULL OF BOOLEANS THAT WILL CONTROL IF FORM SUBMITS OR NOT
const bools = {
    firstname: false, 
    surname1: false,
    nif: false,
    address: false
}

var bool = false;

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
        case "address":
            if(address.value.length != 0) {
                document.getElementById('wrong8').innerHTML = "";
                bools.address = true;
            }else{
                bools.add = false;
                document.getElementById('wrong8').innerHTML = "Este campo no puede estar vacío";
            }
    }
}

/*ADDS A BLUR EVENT FOREACH EXISTING INPUT*/
inputs.forEach((input) => {
    input.addEventListener('blur', validateForm);
});

$(document).ready(function() {
    $.ajax({
    
        method:"GET",
        url:"http://localhost:3000/countries",
        dataType:'json',
        
    }).then(function(data) {
    
        for(var i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            option.text = data[i];
            option.value = data[i];
            select.appendChild(option);
        }
    });
});

/*AJAX REQUEST WHICH CHANGES THE CONTENT OF A SELECT INPUT ACCORDING TO THE CHOSEN OPTION*/
select.addEventListener('change', function() {
    
    $.ajax({
    
        method:"GET",
        url:"http://localhost:3000/regions",
        dataType:'json',
        
    }).then(function(data) {
        var selected_option = select.options[select.selectedIndex].value;
        var dt_sp = data[0]["sp_regions"];
        var dt_fr = data[1]["fr_regions"];
        var dt_it = data[2]["it_regions"];
        
        removeOptions(select2);
        addRegionOptions(select2, dt_sp, dt_fr, dt_it, selected_option);
    });
});

/*AJAX REQUEST WHICH CHANGES THE CONTENT OF A SELECT INPUT ACCORDING TO THE CHOSEN OPTION*/
select2.addEventListener('change', function() {

    $.ajax({

        method:"GET",
        url:"http://localhost:3000/cities",
        dataType:'json',
    }).then(function(data) {
        var selected_option = select2.options[select2.selectedIndex].value;
        var dt_and = data[0]["andalucia_cities"];
        var dt_cat = data[1]["cataluna_cities"];
        var dt_gal = data[2]["galicia_cities"];
        var dt_idf = data[3]["idf_cities"];
        var dt_bor = data[4]["borgona_cities"];
        var dt_nor = data[5]["normandia_cities"];
        var dt_ven = data[6]["veneto_cities"];
        var dt_tos = data[7]["toscana_cities"];
        var dt_apu = data[8]["apulia_cities"];

        removeOptions(select3);
        addCitiesOptions(select3, dt_and, dt_cat, dt_gal, dt_idf, dt_bor, dt_nor, dt_ven, dt_tos, dt_apu, selected_option);

    });
});

/*FUNCTION WHICH REMOVES ALL THE ELEMENTS IN A SELECT ELEMENT*/
function removeOptions(selectElement) {
    for(var i = selectElement.options.length; i >= 0; i--) {
        selectElement.remove(i);
    }
}

/*FUNCTION WHICH ADDS ELEMENTS IN A SELECT ELEMENT HAVING THE SELECT INPUT, 3 KIND OF DATA AND THE OPTIONS AS PARAMETERS*/
function addRegionOptions(slct2, dt1, dt2, dt3, selected_opt) {
    
    switch(selected_opt) {
        case "España":           

            for(var i = 0; i < dt1.length; i++) {
                var option2 = document.createElement("option");
                option2.text = dt1[i];
                option2.value = dt1[i];
                slct2.appendChild(option2);
            }
        break;
        case "Francia":            

            for(var i = 0; i < dt2.length; i++) {
                var option2 = document.createElement("option");
                option2.text = dt2[i];
                option2.value = dt2[i];
                slct2.appendChild(option2);
            }
        break;
        case "Italia":

            for(var i = 0; i < dt3.length; i++) {
                var option2 = document.createElement("option");
                option2.text = dt3[i];
                option2.value = dt3[i];
                slct2.appendChild(option2);
            }
        break;
    }
}

/*FUNCTION THAT ADDS CITIES IN A SELECT INPUT, 9 KIND OF DATA ANd THE SELECTED OPTION*/
function addCitiesOptions(slct3, dt1, dt2, dt3, dt4, dt5, dt6, dt7, dt8, dt9, selected_opt) {

    switch(selected_opt) {
        case "Andalucía":
            for(var i = 0; i < dt1.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt1[i];
                option3.value = dt1[i];
                slct3.appendChild(option3);
            }
        break;
        case "Cataluña":
            for(var i = 0; i < dt2.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt2[i];
                option3.value = dt2[i];
                slct3.appendChild(option3);
            }
        break;
        case "Galicia":
            for(var i = 0; i < dt3.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt3[i];
                option3.value = dt3[i];
                slct3.appendChild(option3);
            }
        break;
        case "Isla de Francia":
            for(var i = 0; i < dt4.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt4[i];
                option3.value = dt4[i];
                slct3.appendChild(option3);
            }
        break;
        case "Borgoña": 
        for(var i = 0; i < dt5.length; i++) {
            var option3 = document.createElement("option");
            option3.text = dt5[i];
            option3.value = dt5[i];
            slct3.appendChild(option3);
        }
        break;
        case "Normandía":
            for(var i = 0; i < dt6.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt6[i];
                option3.value = dt6[i];
                slct3.appendChild(option3);
            }
        break;
        case "Véneto":
            for(var i = 0; i < dt7.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt7[i];
                option3.value = dt7[i];
                slct3.appendChild(option3);
            }
        break;
        case "Toscana":
            for(var i = 0; i < dt8.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt8[i];
                option3.value = dt8[i];
                slct3.appendChild(option3);
            }
        break;
        case "Apulia":
            for(var i = 0; i < dt9.length; i++) {
                var option3 = document.createElement("option");
                option3.text = dt9[i];
                option3.value = dt9[i];
                slct3.appendChild(option3);
            }
        break;
    }
}


$(document).ready(function() {

    //AJAX REQUEST WHICH ALLOWS THE USER MODIFYING AN EXISTING LANGUAGE
    $('#update-user-form').bind("submit", function(e) {
        e.preventDefault();
        //QUERY AJAX REQUEST SENDING THE FORM DATA
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            complete: function(response) {
                //IF THE CONTROLLER RESPONSE EQUALS 1 UPDATE IS SUCCESSFUL
                if(response.responseText == 1 && bools.firstname && bools.surname1 && bools.nif && bools.address) {
                    window.location.href='../Views/UserPersonalData.php';
                }
            }
        });
    
        return false;
    });
});

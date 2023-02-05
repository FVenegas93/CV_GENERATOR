//VARS WHICH TAKES THE SELECT INPUT ELEMENT AND THE ADDRESS INPUT
var select = document.getElementById('input1');
var select2 = document.getElementById('input2');
var select3 = document.getElementById('input3');
var select4 = document.getElementById('input4');
var input5 = document.getElementById('input5');

//VAR WHICH HAS THE FORM
var form_address =  document.getElementById('form_address');

//CONTROLLER CONST
const url2 = "http://localhost/CV_GENERATOR/php/Controllers/CreateAddress.php";

//AJAX REQUEST TO LIST ALL THE COUNTRIES INHERITED TO THE API
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


//EVENTS WHICH CHANGES THE CONTENT OF A SELECT CALLING AN AJAX REQUEST
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

//EVENT THAT SEND THE FORM TO THE SERVER
form_address.addEventListener('submit', (e) => {
    var ajax_resp = document.getElementById('ajax_resp2');
    e.preventDefault();
    use_XHR(form_address, ajax_resp);
});

//FUNCTION WHICH REMOVES THE OPTION OF A SELECT INPUT ELEMENT
function removeOptions(selectElement) {
    for(var i = selectElement.options.length; i >= 0; i--) {
        selectElement.remove(i);
    }
}

//FUNCTIONS WHICH ADDS OPTIONS ON A SELECT INPUT ELEMENT
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

//FUNCTION WITH A XMLREQUEST WHICH REDIRECTS THE USER TO THE INDEX PAGE
function use_XHR(fo, response) {
    let xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", function() {
        if(this.readyState == 4 && this.status == 200) {
            response.innerHTML = this.responseText;
            window.location.href = "http://localhost/CV_GENERATOR/php/Views/index.php";
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



$.ajax({
    
    method:"GET",
    url:"../../json/json-countries.js",
    dataType:'json',
}).then(function(data) {
    console.log(data);

});

/*
const select = $('#input2');

const countries = [
    "españa",
    "italia",
    "francia"
];

const spain_regions = [
    "Andalucía",
    "Valencia",
    "Cataluña",
];

const italy_regions = [
    "Toscana",
    "Véneto",
    "Apulia"
];

const france_regions = [
    "Isla de Francia",
    "Normandía",
    "Occitania"
];

const andalucia_cities = [
    "Sevilla",
    "Morón de la Frontera",
    "Dos Hermanas"
];

const valencia_cities = [
    "Valencia",
    "Alicante",
    "Elche"
];

const cataluna_cities = [
    "Barcelona",
    "Tarragona",
    "Gerona"
];

const toscana_cities = [
    "Florencia",
    "San Gimignano",
    "Monteriggioni"
];

const veneto_cities = [
    "Venecia",
    "Verona",
    "Padua"
];

const apulia_cities = [
    "Bari",
    "Alberobello",
    "Lecce"
];

function validateCountry() {
    var input = country.value;
    var inp = input.toLowerCase();
    var bool = false;
    
    for (var i = 0; i < countries.length; i++) {

        if(inp == countries[i]) {
            country.classList.remove('invalid-input');
            country.classList.add('valid-input');
            bool = true;
            break;
        }else {
            country.classList.remove('valid-input');
            country.classList.add('invalid-input');
            bool = false;
        }
    }

    return bool;
}

function addRegions() {
    var input = country.value;
    var inp = input.toLowerCase();

    if(validateCountry() == true) {
        switch(inp) {
            case "españa":
                
                for(var i = 0; i < spain_regions; i++) {
                    const option = document.createElement('option');
                    const opt = spain_regions[i];
                    option.value = opt;
                    option.text = opt;
                    select.appendChild(option);
                }
            break;

            case "italia":

            break;

            case "francia":

            break;
        }
    }
}*/


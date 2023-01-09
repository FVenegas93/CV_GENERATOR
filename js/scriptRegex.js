var createUser = document.getElementById('submit');
var input1 = document.getElementById('floatingInput1');
var input2 = document.getElementById('floatingInput2');
var input3 = document.getElementById('floatingInput3');
var input4 = document.getElementById('floatingInput4');
var input5 = document.getElementById('floatingInput5');
var input6 = document.getElementById('floatingInput6');
var input7 = document.getElementById('floatingInput7');
var input8 = document.getElementById('floatingInput8');
var input9 = document.getElementById('floatingInput9');
var input10 = document.getElementById('floatingInput10');
var input11 = document.getElementById('floatingInput11');
var input12 = document.getElementById('floatingInput12');
var input13 = document.getElementById('floatingInput13');
var input14 = document.getElementById('floatingInput14');

function validateUsername(input) {
    var regexp = /^\w{6,}$/gm;
    var boolean = false;

    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label1').innerHTML = 'Nombre de usuario';
        boolean = true;
        
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;
        
        if(input.value.length < 6 && input.value.length > 0) {
            document.getElementById('label1').innerHTML = 'Se requieren más de 6 caracteres';
        }else if(input.value.length == 0){
            document.getElementById('label1').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label1').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validatePassword(input) {
    var regexp = /^\w{6,16}$/gm;
    var boolean = false;

    if(regexp.test(input.value) && input.value.length >= 6 && input.value.length <= 16) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label2').innerHTML = 'Contraseña';
        boolean = true;

    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length < 6 || input.value.length > 16) {
            document.getElementById('label2').innerHTML = 'La longitud debe ser entre 6 y 16 caracteres';
        }else {
            document.getElementById('label2').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function checkPasswords(input1, input2) {
    var boolean = false;
    if(input1.value == input2.value) {
        input2.style.backgroundColor = "lightgreen";
        document.getElementById('label3').innerHTML = 'Repetir contraseña';
        boolean = true;
        
    }else {
        input2.style.backgroundColor = "lightcoral";
        document.getElementById('label3').innerHTML = 'Las contraseñas no coinciden';
        boolean = false;
    }

    return boolean;
}

function validateEmail(input) {
    var regexp = /^\w+(@{1})(yahoo|hotmail|gmail|outlook)(\.)(com|org|es)$/gm;
    var boolean = false;

    if(regexp.test(input.value) && input.value.length != 0) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label4').innerHTML = 'Correo electrónico';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label4').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label4').innerHTML = 'El correo introducido no es correcto';
        }
    }

    return boolean;
}

function validateName(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label5').innerHTML = 'Tu nombre';
        boolean = true
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label5').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label5').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validateFirstSurname(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label6').innerHTML = 'Primer apellido';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label6').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label6').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validateSecondSurname(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label7').innerHTML = 'Segundo apellido';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label7').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label7').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validateNif(input) {
    var regexp = /^[0-9]{8}[A-Z]{1}$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label8').innerHTML = 'NIF';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label8').innerHTML = 'Este campo es obligatorio';
        }else if(input.value.length != 9 && input.value.length != 0) {
            document.getElementById('label8').innerHTML = 'El NIF solo tiene 8 dígitos y una letra';
        }else {
            document.getElementById('label8').innerHTML = 'La secuencia de caracteres no es correcta';
        }
    }

    return boolean;
}

function validateAddress(input) {
    var regexp = /^(C\/){1}[A-ZÀ-ÿa-z\u00f1\u00d1]+\,[0-9]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label9').innerHTML = 'Dirección';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0) {
            document.getElementById('label9').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label9').innerHTML = 'La secuencia de caracteres no es correcta';
        }
    }

    return boolean;
}

function validateCountry(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label10').innerHTML = 'País';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0){
            document.getElementById('label10').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label10').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validateRegion(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label11').innerHTML = 'Provincia';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0){
            document.getElementById('label11').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label11').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validateCity(input) {
    var regexp = /^[A-ZÀ-ÿa-z\u00f1\u00d1]+$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label12').innerHTML = 'Ciudad';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0){
            document.getElementById('label12').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label12').innerHTML = 'No se permiten caracteres especiales';
        }
    }

    return boolean;
}

function validatePhone(input) {
    var regexp = /^[679]{1}[0-9]{8}$/gm;
    var boolean = false;
    if(regexp.test(input.value)) {
        input.style.backgroundColor = "lightgreen";
        document.getElementById('label13').innerHTML = 'Teléfono';
        boolean = true;
    }else {
        input.style.backgroundColor = "lightcoral";
        boolean = false;

        if(input.value.length == 0){
            document.getElementById('label13').innerHTML = 'Este campo es obligatorio';
        }else {
            document.getElementById('label13').innerHTML = 'Sólo se admiten 9 dígitos';
        }
    }

    return boolean;
}

function validateAll(input, b1, b2, b3, b4, b5, b6, b7, b8, b9, b10, b11, b12, b13) {
    if(input.checked == true) {
        if(b1 && b2 && b3 && b4 && b5 && b6 && b7 && b8 && b9 && b10 && b11 && b12 && b13) {
            createUser.disabled = false;
        }else{
            createUser.disabled = true;
        }
        
    }else {
        createUser.disabled = true;
    }
}

input1.addEventListener("change", function() {
    validateUsername(input1);
}); 

input2.addEventListener("change", function() {
    validatePassword(input2);
});

input3.addEventListener("change", function() {
    checkPasswords(input2, input3);
});

input4.addEventListener("change", function() {
    validateEmail(input4);
});

input5.addEventListener("change", function() {
    validateName(input5);
});

input6.addEventListener("change", function() {
    validateFirstSurname(input6);
});

input7.addEventListener("change", function() {
    validateSecondSurname(input7);
});

input8.addEventListener("change", function() {
    validateNif(input8);
});
    
input9.addEventListener("change", function() {
    validateAddress(input9);
});

input10.addEventListener("change", function() {
    validateCountry(input10);
});

input11.addEventListener("change", function() {
    validateRegion(input11);
});

input12.addEventListener("change", function() {
    validateCity(input12);
});

input13.addEventListener("change", function() {
    validatePhone(input13);
});

createUser.addEventListener("change", function() {
    validateAll(input14, validateUsername(input1), validatePassword(input2), checkPasswords(input2, input3), 
    validateEmail(input4), validateName(input5), validateFirstSurname(input6), validateSecondSurname(input7), 
    validateNif(input8), validateAddress(input9), validateCountry(input10), validateRegion(input11), 
    validateCity(input12), validatePhone(input13));
});

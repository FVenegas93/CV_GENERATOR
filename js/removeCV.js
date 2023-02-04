
const url = "http://localhost/CV_GENERATOR/php/Controllers/RemoveCV.php?cod_cv=";
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const param = urlParams.get('cod_cv');
const removeURL = url+param;

const redirect = "http://localhost/CV_GENERATOR/php/Views/CVsList.php";

function removeCV(id) {
    var dataString = "id" + id;
    if(confirm("¿BORRAR CV?")) {
        $.ajax({
            type:"POST",
            url:"http://localhost/CV_GENERATOR/php/Controllers/RemoveCV.php?cod_cv="+id+"",
            data: dataString,
            success: function(okay) {
                window.location.href="http://localhost/CV_GENERATOR/php/Views/CVsList.php";
            }
        });
    }
    
}

        
            
        
        

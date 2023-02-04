$(document).ready(function() {
    $('#lang-form').bind("submit", function() {
        //QUERY AJAX REQUEST SENDING THE FORM DATA
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
                
            complete: function(response) {
                //IF THE CONTROLLER RESPONSE EQUALS 1 THE LOGIN IS SUCCESSFUL
                //IF THE LOGIN IS WRONG THEN AN ERROR MESSAGE IS DISPLAYED
                if(response.responseText == 1) {
                    window.location.href='../Views/UserLang.php';
                }
            }
        });
    
        return false;
    });
 });
    
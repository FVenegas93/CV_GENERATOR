$(document).ready(function() {
    //AJAX REQUEST WHICH ALLOWS THE USER MODIFYING AN EXISTING EXPERIENCE
    $('#exp-form').bind("submit", function() {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
                
            complete: function(response) {
                //IF THE CONTROLLER RESPONSE EQUALS 1 UPDATE IS SUCCESSFUL
                
                if(response.responseText == 1) {
                    window.location.href='../Views/UserExp.php';
                }
            }
        });
    
        return false;
    });

    //AJAX REQUEST WHICH ALLOWS THE USER MODIFYING AN EXISTING SELF-DESCRIPTION
    $('#about-form').bind("submit", function(){
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),

            complete: function(response) {
                //IF THE CONTROLLER RESPONSE EQUALS 1 UPDATE IS SUCCESSFUL
                if(response.responseText == 1) {
                    window.location.href='../Views/UserAbout.php';
                }
            }
        });
    });


})
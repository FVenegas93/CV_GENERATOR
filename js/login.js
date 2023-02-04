$(document).ready(function() {
    $('#form-login').bind("submit", function() {
        
        var user = $('#user').val();
        var pass = $('#pass').val();
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            
            complete: function(response) {
                if(response.responseText == 1) {
                    window.location.href='../Views/index.php';
                }else {
                    $('.invalid-log').css('display', 'block');
                    $('#invalid-log').html(response.responseText);
                }
            }
        });

        return false;
    });
});

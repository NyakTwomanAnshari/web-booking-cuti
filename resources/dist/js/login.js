$(document).ready(function(){
    $("#submit").click(function(){
            var npp = $("#npp").val();
            var password = $("#password").val();
        // error without req.fields
        if(npp.length == "" && password.length == ""){
            jQuery("div#err_msg").show();
            jQuery("div#msg").html("All fields are required.");
        return false;
        }
    })
})

// for timeout
window.setTimeout(function() {
$(".alert-dismissible").fadeTo(700, 0).slideUp(500, function(){
    $(this).remove(); }); 
}, 7000);
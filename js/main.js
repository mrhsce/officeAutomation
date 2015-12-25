/**
 * Created by Mohammad on 12/25/2015.
 */



$(document).ready(function(){
    //$('form.login-form button.submit-button').on('click',submit);
});





function submit(){
    var username = $('form.login-form input.username-input').val();
    var password = $('form.login-form input.password-input').val();
    window.location.href = "?username="+username+"&password="+password;
}
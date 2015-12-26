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


function showStatement(){

}

function mainAjax(d,sFunc,ajaxUrl,eFunc,ajaxType,ajaxAsync){
     if (typeof ajaxUrl === "undefined" || ajaxUrl === null) {
        ajaxUrl = 'back/handler.php';
    }
    if (typeof eFunc === "undefined" || eFunc === null) {
        eFunc = mainAjaxErrorFunction;
    }
    if (typeof ajaxType === "undefined" || ajaxType === null) {
        ajaxType = 'POST';
    }
    if (typeof ajaxAsync === "undefined" || ajaxAsync === null) {
        ajaxAsync = true;
    }
    d = JSON.stringify(d);

     $.ajax({
        type: ajaxType,
        async: ajaxAsync,
        url: ajaxUrl,
        data: d,
        headers: {'content-type': 'application/json'},
        before:function(){

        },
        success: function(response){
            response = JSON.parse(response);
            sFunc(response);

        },
        error: function(e){
            eFunc(e);
        },
        complete: function(r){

        }

    });
}

function mainAjaxErrorFunction(){

}


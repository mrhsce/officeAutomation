/**
 * Created by Mohammad on 12/25/2015.
 */



$(document).ready(function(){
    //$('form.login-form button.submit-button').on('click',submit);


    //statement
    $('button.show-statement').on('click',askForStatement);
});



function askForStatement(){
    alert('ask for the statement');

    var d={
        task:'statement',
        personalId:'10101001'
    };
    mainAjax(d,showStatement);
}


function showStatement(r){
    $('div.show-statement').show();
    $('div.main').hide();
    alert('showing the statement');
    $('div.show-statement table.personalInfo td.firstName').innerHTML = r['firstName'];
    $('div.show-statement table.personalInfo td.lastName').innerHTML = r['lastName'];
    $('div.show-statement table.personalInfo td.birthDate').innerHTML = r['birthDate'];
    $('div.show-statement table.personalInfo td.sodoorPlace').innerHTML = r['sodoorPlace'];
    $('div.show-statement table.personalInfo td.nationalId').innerHTML = r['nationalId'];
    $('div.show-statement table.personalInfo td.maritalState').innerHTML = r['maritalState'];
    $('div.show-statement table.personalInfo td.gender').innerHTML = r['gender'];
    $('div.show-statement table.personalInfo td.eduLevel').innerHTML = r['eduLevel'];
    $('div.show-statement table.contractInfo td.contractType').innerHTML = r['contractType'];
    $('div.show-statement table.contractInfo td.postTitle').innerHTML = r['postTitle'];
    $('div.show-statement table.contractInfo td.managerId').innerHTML = r['managerId'];
    $('div.show-statement table.salaryInfo td.mScore').innerHTML = r['mScore'];
    $('div.show-statement table.salaryInfo td.pScore').innerHTML = r['pScore'];
    $('div.show-statement table.salaryInfo td.base').innerHTML = r['base'];
    $('div.show-statement table.salaryInfo td.adding').innerHTML = r['adding'];
    $('div.show-statement table.salaryInfo td.additional').innerHTML = r['additional'];
    $('div.show-statement table.salaryInfo td.badClimate').innerHTML = r['badClimate'];
    $('div.show-statement table.salaryInfo td.hardness').innerHTML = r['hardness'];
    $('div.show-statement table.salaryInfo td.familyScore').innerHTML = r['familyScore'];
    $('div.show-statement table.salaryInfo td.childrenNumber').innerHTML = r['childrenNumber'];
    $('div.show-statement table.salaryInfo td.years').innerHTML = r['years'];
}

function submit(){
    var username = $('form.login-form input.username-input').val();
    var password = $('form.login-form input.password-input').val();
    window.location.href = "?username="+username+"&password="+password;
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


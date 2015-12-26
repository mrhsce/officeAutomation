/**
 * Created by Mohammad on 12/25/2015.
 */



$(document).ready(function(){
    //$('form.login-form button.submit-button').on('click',submit);


    //statement
    $('button.show-statement').on('click',askForStatement);

    //logout
    $('button.logout').on('click',logout);
});

function logout(r){
    var d={
        task:'logout'
    };
    mainAjax(d,function(){
        window.location.href="/index.php";
    });
}

function askForStatement(){
    console.log('ask for the statement');

    var d={
        task:'statement',
        personalId:'10101002'
    };
    mainAjax(d,showStatement);
}


function showStatement(r){
    $('div.show-statement').show();
    $('div.main').hide();
    console.log('first name of statement'+ r['firstName']);
    console.log('last name of statement'+ r['lastName']);

    $('div.show-statement span.personalId').html(r['PersonalID']);
    $('div.show-statement table.personalInfo td.firstName').html(r['firstName']);
    $('div.show-statement table.personalInfo td.lastName').html(r['familyName']);
    $('div.show-statement table.personalInfo td.birthDate').html(r['Birthdate']['date']);
    $('div.show-statement table.personalInfo td.sodoorPlace').html(r['SodoorPlace']);
    $('div.show-statement table.personalInfo td.nationalId').html(r['NationalID']);
    $('div.show-statement table.personalInfo td.maritalState').html(r['maritalStatus']);
    $('div.show-statement table.personalInfo td.gender').html(r['Gender']);
    $('div.show-statement table.personalInfo td.eduLevel').html(r['EduLevel']);
    $('div.show-statement table.personalInfo td.ChildrenNumber').html(r['ChildrenNumber']);
    $('div.show-statement table.contractInfo td.contractType').html(r['contractType']);
    $('div.show-statement table.contractInfo td.postTitle').html(r['PostTitle']);
    $('div.show-statement table.contractInfo td.OfficeTitle').html(r['OfficeTitle']);
    $('div.show-statement table.contractInfo td.managerId').html(r['ManagerID']);
    $('div.show-statement table.salaryInfo td.mScore').html(r['mScore']);
    $('div.show-statement table.salaryInfo td.pScore').html(r['pScore']);
    $('div.show-statement table.salaryInfo td.base').html(r['Base']);
    $('div.show-statement table.salaryInfo td.adding').html(r['Adding']);
    $('div.show-statement table.salaryInfo td.additional').html(r['Additional']);
    $('div.show-statement table.salaryInfo td.badClimate').html(r['BadClimate']);
    $('div.show-statement table.salaryInfo td.hardness').html(r['Hardness']);
    $('div.show-statement table.salaryInfo td.familyScore').html(r['FamilyScore']);
    $('div.show-statement table.salaryInfo td.children').html(r['Children']);
    $('div.show-statement table.salaryInfo td.years').html(r['Years']);
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


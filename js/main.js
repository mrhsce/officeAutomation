/**
 * Created by Mohammad on 12/25/2015.
 */



$(document).ready(function(){
    //$('form.login-form button.submit-button').on('click',submit);


    //statement
    $('button.show-statement').on('click',function(){
        askForStatement);
    });

    //personalInfo
    $('button.show-personalInfo').on('click',function(){
        askForPersonalInfo();
    });

    //showSalaries
    $('button.show-salaries').on('click',function(){
        askForSalaries);
    });

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
    console.log('asking for the statement');

    var d={
        task:'statement',
        personalId:'10101002'
    };
    mainAjax(d,showStatement);
}

function askForPersonalInfo(){
    console.log('asking for personal information')

    var d={
        task:'personalId',
        personalId:'10101002'
    };
    mainAjax(d,showPersonalInfo);
}

function askForSalaries(){
    console.log('asking for salary information')

    var d={
        task:'salaries',
        personalId:'10101002'
    };
    mainAjax(d,showSalaries);
}

function showSalaries(r){
    $('div.show-statement table.salaryInfo td.mScore').html(r['mScore']);
    $('div.show-statement table.salaryInfo td.pScore').html(r['pScore']);
    $('div.show-statement table.salaryInfo td.base').html(r['base']);
    $('div.show-statement table.salaryInfo td.adding').html(r['adding']);
    $('div.show-statement table.salaryInfo td.additional').html(r['additional']);
    $('div.show-statement table.salaryInfo td.badClimate').html(r['badClimate']);
    $('div.show-statement table.salaryInfo td.hardness').html(r['hardness']);
    $('div.show-statement table.salaryInfo td.familyScore').html(r['familyScore']);
    $('div.show-statement table.salaryInfo td.children').html(r['children']);
    $('div.show-statement table.salaryInfo td.years').html(r['years']);
    $('div.show-statement table.salaryInfo td.sum').html(r['sum']);
}

function showPersonalInfo(r){
    $('div.show-statement span.personalId').html(r['personalID']);
    $('div.show-statement table.personalInfo td.firstName').html(r['firstName']);
    $('div.show-statement table.personalInfo td.lastName').html(r['lastName']);
    $('div.show-statement table.personalInfo td.birthDate').html(r['birthdate']['date']);
    $('div.show-statement table.personalInfo td.sodoorPlace').html(r['sodoorPlace']);
    $('div.show-statement table.personalInfo td.nationalId').html(r['nationalID']);
    $('div.show-statement table.personalInfo td.maritalState').html(r['maritalStatus']);
    $('div.show-statement table.personalInfo td.gender').html(r['gender']);    
    $('div.show-statement table.personalInfo td.ChildrenNumber').html(r['childrenNumber']);

    $('div.show-statement table.educationInfo td.eduLevel').html(r['eduLevel']);
    $('div.show-statement table.educationInfo td.field').html(r['field']);
    $('div.show-statement table.educationInfo td.institute').html(r['institute']);
    $('div.show-statement table.educationInfo td.graduationDate').html(r['graduationDate']);
    $('div.show-statement table.educationInfo td.finalProjectTitle').html(r['finalProjectTitle']);
    $('div.show-statement table.educationInfo td.average').html(r['average']);
}

function showStatement(r){
    $('div.show-statement').show();
    $('div.main').hide();
    console.log('first name of statement'+ r['firstName']);
    console.log('last name of statement'+ r['lastName']);

    $('div.show-statement span.personalId').html(r['PersonalID']);
    $('div.show-statement table.personalInfo td.firstName').html(r['firstName']);
    $('div.show-statement table.personalInfo td.lastName').html(r['lastName']);
    $('div.show-statement table.personalInfo td.birthDate').html(r['birthdate']['date']);
    $('div.show-statement table.personalInfo td.sodoorPlace').html(r['sodoorPlace']);
    $('div.show-statement table.personalInfo td.nationalId').html(r['nationalID']);
    $('div.show-statement table.personalInfo td.maritalState').html(r['maritalStatus']);
    $('div.show-statement table.personalInfo td.gender').html(r['gender']);
    $('div.show-statement table.personalInfo td.eduLevel').html(r['eduLevel']);
    $('div.show-statement table.personalInfo td.ChildrenNumber').html(r['childrenNumber']);
    $('div.show-statement table.contractInfo td.contractType').html(r['contractType']);
    $('div.show-statement table.contractInfo td.postTitle').html(r['postTitle']);
    $('div.show-statement table.contractInfo td.OfficeTitle').html(r['officeTitle']);
    $('div.show-statement table.contractInfo td.managerId').html(r['managerID']);
    $('div.show-statement table.salaryInfo td.mScore').html(r['mScore']);
    $('div.show-statement table.salaryInfo td.pScore').html(r['pScore']);
    $('div.show-statement table.salaryInfo td.base').html(r['base']);
    $('div.show-statement table.salaryInfo td.adding').html(r['adding']);
    $('div.show-statement table.salaryInfo td.additional').html(r['additional']);
    $('div.show-statement table.salaryInfo td.badClimate').html(r['badClimate']);
    $('div.show-statement table.salaryInfo td.hardness').html(r['hardness']);
    $('div.show-statement table.salaryInfo td.familyScore').html(r['familyScore']);
    $('div.show-statement table.salaryInfo td.children').html(r['children']);
    $('div.show-statement table.salaryInfo td.years').html(r['years']);
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


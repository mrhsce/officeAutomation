/**
 * Created by Mohammad on 12/25/2015.
 */



$(document).ready(function(){
    //logout
    $('a.logout-link').on('click',logout);

    //export
    $('a.export-btn').on('click',exportIt);
});

function logout(){
    var d={
        task:'logout'
    };
    mainAjax(d,function(){
        window.location.href="index.php";
    });
}



$('div.ceo-pId-main').ready(function(){
    askForPersonalInfo();
});

$('div.salary-main').ready(askForSalaries);

$('div.all-employee-table-container').ready(askAllEmployeeList);






















function exportIt(){
    window.print();
}

function askAllEmployeeList(){
    //console.log('asking for the employee list under the command of the porson');
    //TODO
    var d={
        task:'allList'
    };
    mainAjax(d,fillTable);
}

function fillTable(r){
    console.log('array received for filling the table');
    console.log(r);

    var n = r.length;

    var post;

    var rows = '';
    var row = '';
    for(var i = 0; i<n ; i++){
        if (r[i]['post'] == null) post = 'None';
        else post = r[i]['post'];

        row = '<tr>' +
            '<td>'+
            r[i]['firstName']+
            '</td><td>' +
            r[i]['lastName']+
            '</td><td>' +
            r[i]['gender']+
            '</td><td>' +
            r[i]['nationalId']+
            '</td><td>' +
            r[i]['personalId']+
            '</td><td>' +
            r[i]['contractType']+
            '</td><td>' +
            post+
            '</td><td>' +
            r[i]['officeUnit']+
            '</td><td>' +
            r[i]['eduLevel']+
            '</td></tr>';
        rows += row;
    }

    $('div.all-employee-table-container table tbody').html(rows);

}

function askForOfficeList(){
    console.log('asking for the list of all offices');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForPostList(){
    console.log('asking for the post of all posts');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForEditBaseTable(){
    console.log('asking for editing the base table');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForEditContract(){
    console.log('asking for promoting or concluding contract');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForDeleteEmployee(){
    console.log('asking for deleting the employee');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForEditOfficeUnit(){
    console.log('asking for add or update of the office unit');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForEditPost(){
    console.log('asking for add or edit post');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForEditScore(){
    console.log('asking for editing the score');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForBaseTable(){
    console.log('asking for showing the base table');

    //TODO
    //var d={
    //    task:'statement',
    //    personalId:'10101002'
    //};
    //mainAjax(d,showStatement);
}

function askForPersonalInfo(){
    console.log('asking for personal information');

    var d={
        task:'personalInfo',
        personalId:'10101002'
    };
    mainAjax(d,showPersonalInfo);
}

function askForSalaries(){
    console.log('asking for salary information');

    var d={
        task:'salaries',
        personalId:'10101002'
    };
    mainAjax(d,showSalaries);
}

function showEmployeeList(){
    //TODO there should be iteration here over all the employees
}

function showOffices(){
    //TODO there should be iteration here over all the offices
}

function showEditContract(){
    //TODO there should be iteration here over all the posts
}

function showEditEmployee(){
    //TODO there should be iteration here over all the posts
}

function showEditOffice(){
    //TODO there should be iteration here over all the posts
}

function showEditPosts(){
    //TODO there should be iteration here over all the posts
}
function showSalaries(r){
    var mScore = Number(r['mScore']) || 0;
    var pScore = Number(r['pScore']) || 0;
    var base = Number(r['base']) || 0;
    var adding = Number(r['adding']) || 0;
    var additional = Number(r['additional']) || 0;
    var badClimate = Number(r['badClimate']) || 0;
    var hardness = Number(r['hardness']) || 0;
    var familyScore = Number(r['familyScore']) || 0;
    var children = Number(r['children']) || 0;
    var years = Number(r['years']) || 0;
    var length = Number(r['length']) || 0;
    var cNumber = Number(r['childrenNumber']) || 0;
    var sum = mScore + pScore + base + adding + additional + badClimate + hardness;
    if(r['maritalStatus']=='S')  familyScore = 0;

    if(cNumber>3) children = 3 * children;
    else children = cNumber * children;

    years =  parseInt(length / 12) * years;

    sum += children + familyScore + years;
    sum *= 900;


    $('div.salary-main div.for-mScore').html(r['mScore']);
    $('div.salary-main div.for-pScore').html(r['pScore']);
    $('div.salary-main div.for-base').html(r['base']);
    $('div.salary-main div.for-adding').html(r['adding']);
    $('div.salary-main div.for-additional').html(r['additional']);
    $('div.salary-main div.for-badClimate').html(r['badClimate']);
    $('div.salary-main div.for-hardness').html(r['hardness']);
    $('div.salary-main div.for-familyScore').html(familyScore);
    $('div.salary-main div.for-children').html(children);
    $('div.salary-main div.for-years').html(years);
    $('div.salary-main div.for-sum').html(sum);
}

function showPersonalInfo(r){
    $('div.show-personalInfo').show();
    $('div.main').hide();
    console.log(r);

    $('div.show-personalInfo span.personalId').html(r['personalID']);
    $('div.pId-main div.for-firstName').html(r['firstName']);
    $('div.pId-main div.for-lastName').html(r['lastName']);
    $('div.pId-main div.for-birthDate').html(r['birthDate']['date']);
    $('div.pId-main div.for-bornPlace').html(r['sodoorPlace']);
    $('div.pId-main div.for-nationalId').html(r['nationalId']);
    $('div.pId-main div.for-maritalStatus').html(r['maritalStatus']);
    $('div.pId-main div.for-gender').html(r['gender']);
    $('div.pId-main div.for-childrenNumber').html(r['childrenNumber']);

    $('div.pId-main div.for-eduLevel').html(r['eduLevel']);
    $('div.pId-main div.for-field').html(r['field']);
    $('div.pId-main div.for-institute').html(r['institute']);
    $('div.pId-main div.for-graduationDate').html(r['graduationDate']['date']);
    $('div.pId-main div.for-finalProjectTitle').html(r['finalProjectTitle']);
    $('div.pId-main div.for-average').html(r['average']);

    /*$('div.show-personalInfo span.personalId').html(r['personalID']);
    $('div.show-personalInfo table.personalInfo td.firstName').html(r['firstName']);
    $('div.show-personalInfo table.personalInfo td.lastName').html(r['lastName']);
    $('div.show-personalInfo table.personalInfo td.birthDate').html(r['birthDate']['date']);
    $('div.show-personalInfo table.personalInfo td.sodoorPlace').html(r['sodoorPlace']);
    $('div.show-personalInfo table.personalInfo td.nationalId').html(r['nationalId']);
    $('div.show-personalInfo table.personalInfo td.maritalStatus').html(r['maritalStatus']);
    $('div.show-personalInfo table.personalInfo td.gender').html(r['gender']);
    $('div.show-personalInfo table.personalInfo td.childrenNumber').html(r['childrenNumber']);

    $('div.show-personalInfo table.educationInfo td.eduLevel').html(r['eduLevel']);
    $('div.show-personalInfo table.educationInfo td.field').html(r['field']);
    $('div.show-personalInfo table.educationInfo td.institute').html(r['institute']);
    $('div.show-personalInfo table.educationInfo td.graduationDate').html(r['graduationDate']['date']);
    $('div.show-personalInfo table.educationInfo td.finalProjectTitle').html(r['finalProjectTitle']);
    $('div.show-personalInfo table.educationInfo td.average').html(r['average']);*/
}

function showStatement(r){
    $('div.show-statement').show();
    $('div.main').hide();
    //console.log(r);
    console.log('first name of statement'+ r['firstName']);
    console.log('last name of statement'+ r['lastName']);

    $('div.show-statement span.personalId').html(r['PersonalID']);
    $('div.show-statement table.personalInfo td.firstName').html(r['firstName']);
    $('div.show-statement table.personalInfo td.lastName').html(r['lastName']);
    $('div.show-statement table.personalInfo td.birthDate').html(r['birthDate']['date']);
    $('div.show-statement table.personalInfo td.sodoorPlace').html(r['sodoorPlace']);
    $('div.show-statement table.personalInfo td.nationalId').html(r['nationalId']);
    $('div.show-statement table.personalInfo td.maritalState').html(r['maritalStatus']);
    $('div.show-statement table.personalInfo td.gender').html(r['gender']);
    $('div.show-statement table.personalInfo td.eduLevel').html(r['eduLevel']);
    $('div.show-statement table.personalInfo td.ChildrenNumber').html(r['childrenNumber']);
    $('div.show-statement table.contractInfo td.contractType').html(r['contractType']);
    $('div.show-statement table.contractInfo td.postTitle').html(r['postTitle']);
    $('div.show-statement table.contractInfo td.OfficeTitle').html(r['officeTitle']);
    $('div.show-statement table.contractInfo td.managerId').html(r['managerId']);
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


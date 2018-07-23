$(document).on('ready pjax:success', function () {
    $('.ajaxform').ajaxForm({
        beforeSerialize: beforeSerialize,
        beforeSubmit:beforeSaving,
        success: function (data) {
            $.magnificPopup.close();
        }
    });

    $('#editForm').ajaxForm({
        beforeSubmit: beforeSaving,
        success: function (data) {
            window.location = data.url;
        }
    });
});

function beforeSerialize(){
    if(typeof ajaxformbeforeSerialize !== "undefined"){
        // ajaxformbeforeSerialize();
    }
}
//input validations
function beforeSaving(arr, $form, options) {
    var i;
    for (i = 0; i < arr.length; i++) {

        if (arr[i].name == "name") {
            var name = arr[i].value;
        }
        else if (arr[i].name == "email") {
            var email = arr[i].value;
        }
        else if (arr[i].name == "address") {
            var address = arr[i].value;
        }
        else if (arr[i].name == "country") {
            var country = arr[i].value;
        }
        else if (arr[i].name == "city") {
            var city = arr[i].value;
        }
    }
    //name validation
    var nameRegex = /^[A-Za-z ]+$/;
    var nameResult = nameRegex.test(name);
    if (nameResult == true) {
        document.getElementById('testname').innerHTML = "";
    }
    else {
        document.getElementById('testname').innerHTML = "name invalide";
        return false;
    }

    //email validation
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var emailResult = emailRegex.test(email);
    if (emailResult == true) {
        document.getElementById('testemail').innerHTML = "";
    }
    else {
        document.getElementById('testemail').innerHTML = "email invalide";
        return false;
    }

    //address validation
    var addressRegex = /^\d+\s[A-Za-z0-9 ]+\s[A-Za-z ]+/g;

    var addressResult = addressRegex.test(address);

    if (addressResult == true) {
        document.getElementById('testaddress').innerHTML = "";
    }
    else {
        document.getElementById('testaddress').innerHTML = "address invalide";
        return false;
    }

    //country validation
    if (country != -1 && country) {
        document.getElementById('testcountry').innerHTML = "";
    }
    else {
        document.getElementById('testcountry').innerHTML = "country invalide";
        return false;
    }

    //city validation
    if (city) {
        document.getElementById('testcity').innerHTML = "";
    }
    else {
        document.getElementById('testcity').innerHTML = "city invalide";
        return false;
    }
}
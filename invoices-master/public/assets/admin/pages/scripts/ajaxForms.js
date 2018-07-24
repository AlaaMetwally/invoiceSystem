$(document).on('ready pjax:success', function () {
    $('#myForm').ajaxForm({
        beforeSubmit: validateRegex,
        success: function (data) {
            window.location = data.url;
        }
    });
    $('.ajaxform').ajaxForm({
        beforeSerialize: beforeSerialize,
        beforeSubmit: beforeSaving,
        success: function (data) {
            document.getElementById('logo').src = btoa(data.image);
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

function beforeSerialize() {
    if (typeof ajaxformbeforeSerialize !== "undefined") {
        ajaxformbeforeSerialize();
    }
}

function validateRegex(arr, $form, options) {
    var i;
    for (i = 0; i < arr.length; i++) {
        if (arr[i].name == "name") {
            var name = JSON.stringify(arr[i].value);
        }
    }
    var nameRegex = /^"[a-zA-Z0-9]+([a-zA-Z0-9 ])*"$/;
    var nameResult = nameRegex.test(name);
    if (nameResult == true) {
        return true;
    }
    else {
        swal("Please Enter A Correct Adjustment Name");
        return false;
    }
}


//input validations
function beforeSaving(arr, $form, options) {
    var i;
    var check = true;
    for (i = 0; i < arr.length; i++) {
        $input = $('[name=' + arr[i].name + ']');
        $validation_rule = $input.attr('data-validation');

        if ($validation_rule == "name") {
            var name = $input.val();
            check = nameValidate(name, check);
        }
        else if ($validation_rule == "email") {
            var email = $input.val();
            check = emailValidate(email, check);
        }
        else if ($validation_rule == "required") {
            var text = $input.val();
            check = requiredValidate(text, check);
        }
        else if ($validation_rule == "country") {
            var country = $input.val();
            check = countryValidate(country, check);
        }
        else if ($validation_rule == "city") {
            var city = $input.val();
            check = cityValidate(city, check);
        }
    }
    return check;
}

function nameValidate(name, check) {
    var nameRegex = /^[A-Za-z ]+$/;
    var nameResult = nameRegex.test(name);
    if (nameResult == true) {
        document.getElementById('testname').innerHTML = "";
        return check;
    }
    else {
        document.getElementById('testname').innerHTML = "name invalid";
        return false;
    }
}

function emailValidate(email, check) {
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var emailResult = emailRegex.test(email);
    if (emailResult == true) {
        document.getElementById('testemail').innerHTML = "";
        return check;
    }
    else {
        document.getElementById('testemail').innerHTML = "email invalid";
        return false;
    }

}

function requiredValidate(text, check) {
    var addressRegex = /^\d+\s[A-Za-z0-9 ]+\s[A-Za-z ]+/g;

    var addressResult = addressRegex.test(text);

    if (addressResult == true) {
        document.getElementById('testaddress').innerHTML = "";
        return check;
    }
    else {
        document.getElementById('testaddress').innerHTML = "text invalid";
        return false;
    }

}

function countryValidate(country, check) {
    if (country != -1 && country) {
        document.getElementById('testcountry').innerHTML = "";
        return check;
    }
    else {
        document.getElementById('testcountry').innerHTML = "country invalid";
        return false;
    }

}

function cityValidate(city, check) {
    if (city) {
        document.getElementById('testcity').innerHTML = "";
        return check;
    }
    else {
        document.getElementById('testcity').innerHTML = "city invalid";
        return false;
    }
}

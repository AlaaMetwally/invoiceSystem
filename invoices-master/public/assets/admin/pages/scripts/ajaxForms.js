$(document).on('ready pjax:success', function () {
    $('#myForm').ajaxForm({
        beforeSubmit: validateRegex,
        success: function (data) {
            window.location = data.url;
        }
    });
    $('.ajaxform').ajaxForm({
        beforeSubmit: beforeSaving,
        success: function (data) {
            if (data.url) {
                window.location = data.url;
            }
            else if(data.error){
                document.getElementById('testemail').innerHTML="Email Exists";
            }
            else {
                $.magnificPopup.close();
            }
        },
        error:function(response){
            console.log(response)
        }
    });
});


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
        input_name =  arr[i].name;
        $input = $('[name=' + input_name + ']');
        $validation_rule = $input.attr('data-validation');
        // if($("select option").filter(function() {
        //     return this.value;
        // }).length === 0){
        //     document.getElementById('testselect').innerHTML = "add new option";
        //     return false;
        // }

        if ($validation_rule == "name") {
            var name = $input.val();
            check = nameValidate(name, check);
        }
        else if ($validation_rule == "number") {
            var number = $input.val();
            check = numberValidate(number, check);
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
        else if ($validation_rule == "select") {
            var select = $input.val();
            var select_name = input_name;

            check = selectValidate(select, check,select_name,$input.is(":hidden"));
        }
        else if ($validation_rule == "addname") {
            var addname = $input.val();
            check = addnameValidate(addname, check,$input);
        }
    }
    return check;
}
function numberValidate(number, check) {
    var numberRegex = /^[0-9]+$/;
    var numberResult = numberRegex.test(number);
    if (numberResult == true) {
        $('.testnumber').hide();
        return check;
    }
    else {
        $('.testnumber').text("number invalid");
        return false;
    }
}
function nameValidate(name, check) {
    var nameRegex = /^[A-Za-z ]+$/;
    var nameResult = nameRegex.test(name);
    if (nameResult == true) {
        $('.testname').hide();
        return check;
    }
    else {
        $('.testname').show();
        $('.testname').text("name invalid");
        return false;
    }
}
function addnameValidate(addname, check,inputcheck) {
    var nameRegex = /^[A-Za-z ]+$/;
    var nameResult = nameRegex.test(addname);
    var hidden = inputcheck.is(":hidden")
    var show = inputcheck.closest('div').find('.testaddname')

    if(nameResult == true && !hidden){
        show.hide()
        inputcheck.closest('div').find('.testselect').show()
        inputcheck.closest('div').find('.testselect').text("please click on add")
    }
    else if (nameResult == true || hidden) {
        show.hide()
        return check;
    }
    else if(nameResult == false || !hidden) {
        show.text("name invalid");
        show.show()
        return false;
    }

}
function emailValidate(email, check) {
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var emailResult = emailRegex.test(email);
    if (emailResult == true) {
        $('.testemail').hide();
        return check;
    }
    else {
        $('.testemail').text("email invalid");
        return false;
    }

}

function requiredValidate(text, check) {
    var addressRegex = /^[A-Za-z0-9 ]+\s[A-Za-z0-9 ]+/g;

    var addressResult = addressRegex.test(text);

    if (addressResult == true) {
        $('.testrequired').hide();
        return check;
    }
    else {
        $('.testrequired').text("text invalid");
        return false;
    }

}

function countryValidate(country, check) {
    if (country != -1 && country) {
        $('.testcountry').hide();
        return check;
    }
    else {
        $('.testcountry').text("country invalid");
        return false;
    }

}

function cityValidate(city, check) {
    if (city) {
        $('.testcity').hide();
        return check;
    }
    else {
        $('.testcity').text("city invalid");
        return false;
    }
}

function selectValidate(select, check, select_name,hidden) {
    if (select || hidden) {
        $('[name=' + select_name + ']').next('p').hide();
        return check;
    }
    else {
        $('[name=' + select_name + ']').next('p').show();
        $('[name=' + select_name + ']').next('p').text("please select one of the options")
        $('[name=' + select_name + ']').closest('div').find('.testaddname').hide(); //input
        return false;
    }
}

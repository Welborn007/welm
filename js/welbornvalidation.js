var base_url = "http://localhost/welborn/";
//var base_url = "http://192.168.1.100/laundry";

function trim(str) {
    return(("" + str).replace(/^\s*([\s\S]*\S+)\s*$|^\s*$/, '$1'));
}

function isValidEmail(value) {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (filter.test(trim(value)))
        return true;
    else
        return false;
}

function isPhone(value) {

    var iChars = "0123456789+-#/() ";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isNumber(value) {

    var iChars = "0123456789";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isNumDigit(value) {
    var iChars = "0123456789.";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isPincode(value)
{
    var iChars = "0123456789() ";
    for (var i = 0; i < value.length; i++)
    {
        if (iChars.indexOf(value.charAt(i)) == -1)
        {
            return false;
        }
    }
    return true;
} //End of isPinocde()


function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function showError(msg, id) {
    if ($("#" + id).closest("div").hasClass("error")) {
        $("#" + id).closest("div").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("div").addClass("error");
        $("#" + id).closest("div").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeError(id) {
    $("#" + id).closest("div").removeClass("error");
    $("#" + id).closest("div").find("span.errorMsgArrow").remove();
}

function CheckValidation(rest_data)

{
    var result = $.ajax({
        url: base_url + "admin/CheckFieldValidation",
        type: 'POST',
        async: false,
        data: rest_data,
        success: function (msg) {

        }

    }).responseText;
    return result;
}

function CheckClientCampaignValidation(rest_data)

{
    var result = $.ajax({
        url: base_url + "admin/CheckClientCampDup",
        type: 'POST',
        async: false,
        data: rest_data,
        success: function (msg) {

        }

    }).responseText;
    return result;
}
// Start of Document ready Section


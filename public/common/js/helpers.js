function getByID(id) {
    return document.getElementById(id);
}

function displayElementByID(id) {
    getByID(id).style.display = "block";
}

function getTextFromSelectObject(selectObject) {
    return selectObject.options[selectObject.selectedIndex].text;
}

function validateFormData(formToBeValidated) {
    var parent_section = $(document).find(formToBeValidated);
    var next_step = true;

    
    // fields validation
    parent_section.find('input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="date"], textarea, select').each(function() {
        if( $(this).val() == "" || $(this).val() == 0 ) {
            $(this).css('border', '1px solid #aa0000');
            $(this).siblings().css('color', '#ff0000');
            $(this).siblings().remove('small');
            $(this).after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;This field is required</small>');
            next_step = false;
        } else {
            $(this).css('border', '1px solid #eee');
            $(this).siblings().css('color', '#666');
            $(this).siblings().remove('small');

            // Check if IP Address is a standard IP Address
            if ($(this).attr('id') == 'db_host') {
                if (!regexIPAddressTesting(getByID('db_host').value)) {
                    next_step = false;
                    failedRegexIPValidation('db_host', 'Invalid IP address.', 'far fa-times-circle')
                }
            }

            if ($(this).attr('id') == 'db_password') {
                var config = {
                    host: getByID('db_host').value,
                    username: getByID('db_admin_username').value,
                    password: getByID('db_password').value,
                    database: getByID('db_name').value
                };

                var isDBDataOK = validateDBConnectivityUsingAjaxSync(config, '/api/test-db-connection');
                if (!isDBDataOK.status) {
                    next_step = false;
                    highLightAllFields(['db_host', 'db_admin_username', 'db_password', 'db_name', 'db_connection', 'db_port']);
                    flashMessages(isDBDataOK.message, "errorMsg", "", "#ee0000");
                }
            }

            // check if password field and confirm password field matches
            if ($(this).attr('id') == 'cms_confirm_password') {
                password = getByID('cms_password').value;
                confirmPassword = getByID('cms_confirm_password').value;
                if(!(password === confirmPassword)) {
                    next_step = false;
                    failedRegexIPValidation('cms_confirm_password', 'Confirm password MUST match password field.', 'far fa-times-circle')
                }
            }
        }
    });

    return next_step;
}

function getFormData(formWhoseDataIsToBeExtracted) {
    var parent_section = $(document).find(formWhoseDataIsToBeExtracted);
    var formData = {};  
    parent_section.find('input[type="text"], input[type="password"], input[type="email"], input[type="file"], input[type="number"], input[type="date"], textarea, select').each(function() { 
        if( $(this).val() == "" || $(this).val() == 0 ) {
        } else {
            if($(this).attr('type') == 'file') {
                var file = $(this).prop('files')[0];
                formData[$(this).attr('name')] = file;       
            } else {
                formData[$(this).attr('name')] = $(this).val();
            } 
        }
    });
    return formData;
}

function regexIPAddressTesting(ipaddress) {
    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress)) {  
        return true;
    } else {
        return false;
    }
}

function failedRegexIPValidation(id, msg, faclass) {
    $('#'+id).css('border', '1px solid #aa0000');
    $('#'+id).siblings().css('color', '#ff0000');
    $('#'+id).siblings().remove('small');
    $('#'+id).after(`<small style="color: #ff0000;"><i class="${faclass}" style="font-size: 130%;"></i> &nbsp;${msg}</small>`);
}

function ValidateIPaddress(ipaddress) { 
    var isValidIPAddress = regexIPAddressTesting(ipaddress);
    if (isValidIPAddress) {  
      return {
          status: true,
          colorCode: '#00aa00',
          msg: '<i class="far fa-check-circle" style="font-size: 130%;"></i> &nbsp; IP address is valid.'
      }  
    }  
    return {
        status: true,
        colorCode: '#ff0000',
        msg: '<i class="far fa-times-circle" style="font-size: 130%;"></i> &nbsp; Invalid IP address.'
    }    
} 

function getPortNumber(connectionType) {

    var port = undefined;
    switch(connectionType) {
        case 'mysql':
            port = 3306;
            break;
        case 'postgres':
            port = 5432;
            break;
        default:
            port = "";
    }

    return port;
}

function keyboardCombinationConsideredAsAnEdit(event) {
    var keys = `ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_+~<,>.?/\}]|{[:;"'`;
    var isEditKeyPressed = false;
    for(i=0; i<keys.length; i++) {
        if (keys[i] == event.key) {
            isEditKeyPressed = true;
            break;
        }
    }
    return isEditKeyPressed;
}

function makeAJAXRequest(route, requestFormData={}, targetElement="", method="POST") {
    $.ajax({
        type: method,
        url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { formData: requestFormData },
        dataType: 'json',
        success: function(data){
            $('.btn-close').click();
            if (!data.status) {
                flashMessages(data.message, targetElement, url="", type="#ff0000")
            }

            if (data.status) {
                flashMessages(data.message, targetElement, data.url);
            }
        },
        error: function(data, textStatus, errorThrown) {
            console.log("error");
        }    
    });
}

function makeSyncAJAXRequest(Url, formData={}, method="POST"){
    // strUrl is whatever URL you need to call
    var strReturn;
  
    jQuery.ajax({
      type: method,
      url: Url,
      data: { formData: formData },
      success: function(html) {
        strReturn = html;
      },
      async:false
    });
  
    return strReturn;
}

function makeAJAXUpdateRequest(requestURL, formData, targetElement=""){
    $.ajax({
        type: 'POST',
        url: requestURL,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { _method: "PUT", formData },
        dataType: 'json',
        success: function(data){
            $('.btn-close').click();
            if (!data.status) {
                flashMessages(data.message, targetElement, data.url, type="#ff0000")
            }

            if (data.status) {
                flashMessages(data.message, targetElement, data.url);
            }
        },
        error: function(data, textStatus, errorThrown) {
            console.log("error");
        }  
    });
}

function makeAJAXDeleteRequest(requestURL, id="", delete_factor="", targetElement=""){
    $.ajax({
        type: 'POST',
        url: requestURL,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { _method: "DELETE", id , delete_factor },
        dataType: 'json',
        success: function(data){
            $('.btn-close').click();
            if (!data.status) {
                flashMessages(data.message, targetElement, data.url, type="#ff0000")
            }

            if (data.status) {
                flashMessages(data.message, targetElement, data.url);
            }
        },
        error: function(data, textStatus, errorThrown) {
            console.log("error");
        }  
    });
}

function getSVGClickTarget(events) {
    if (events.target.tagName === "svg" || events.target.tagName === "path") {
        if (events.target.tagName === "svg") {
            return events.target;
        }

        if (events.target.tagName === "path") {
            return events.target.parentNode;
        }
    }
}

function removeErrorColor(e) {
    var targetId = e.target.id;
    $('#'+targetId).css('border', '1px solid #eee');
    if (targetId != 'db_host') {
        $('#'+targetId).siblings().css('color', '#666');
        $('#'+targetId).siblings().remove('small');
    }
}

function updateErrorColors(id) {
    $('#'+ id).css('border', '1px solid #eee');
    $('#'+ id).siblings().css('color', '#666');
    $('#'+ id).siblings().remove('small');
}

document.addEventListener('input', removeErrorColor);
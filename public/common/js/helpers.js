var emailParamsObject = undefined;
var proceed = false;

function getByID(id) {
    return document.getElementById(id);
}

function displayElementByID(id) {
    if (getByID(id)) {
        getByID(id).style.display = "block";
    } 
}

function abort()
{
   throw new Error('This is just to abort javascript. Dev Defined');
}

function stopSetInterval(interval) {
    clearInterval(interval);
    console.log("Stopped running interval instance ...");
}

function capitalizeAWord(word) {
    return (word.charAt(0).toUpperCase() +
    word.slice(1).toLowerCase()).trim();
}

function capitalizeWordsInAString(aString) {
    var wordsArray = aString.split(' ');
    var newString = '';
    if (wordsArray.length == 1) {
        return capitalizeAWord(aString);
    }

    for (i=0; i<wordsArray.length; i++) {
        if (wordsArray[i] != " ") {
            newString += capitalizeAWord(wordsArray[i]) + " ";
        }
        
    }

    return newString.trim();
}

function formatDate(input, stringMonth="") {
    var d = new Date(input);
    var yy = d.getFullYear();
    var mm = d.getMonth()+1;
    var dd = d.getDate();

    var month = [
        'January', 'Feburary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    ]
    if(dd<10){
        dd='0'+dd
    }

    var monNumb=mm-1;

    if(mm<10){
        mm='0'+mm
    } mm

    if(stringMonth){
        return [dd, month[monNumb]+",", yy].join(' ');
    }
    return [dd, mm, yy].join('-');
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
    parent_section.find('input[type="text"], input[type="hidden"], input[type="password"], input[type="email"], input[type="file"], input[type="number"], input[type="date"], textarea, select').each(function() { 
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

function makeAJAXUploadImageRequest(formID, targetElement="") {
    console.log("Yes");
    $('form#' + formID).submit(function(e){
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/manager/upload-image',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                $('.btn-close').click();
                if (!data.status) {
                    flashMessages(data.message, targetElement, "", type="#ff0000");
                }
    
                if (data.status) {
                    flashMessages(data.message, targetElement);
                }
            },
            error: function(data, textStatus, errorThrown) {
                $('.btn-close').click();
                flashMessages("Internal Server Error!!!", "errorMsg", "", type="#ff0000");
            }    
        });
    });

    $('form#' + formID).submit(); 
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

/*
    99999999999999999999999999999999
    99999999999999999999999999999999
    99999999999999999999999999999999
*/
var keys = keys || function (o) { var a = []; for (var k in o) a.push(k); return a; };

function generateSlug(string) {
//  var accents = "àáäâèéëêìíïîòóöôùúüûñç";
    var accents = "\u00e0\u00e1\u00e4\u00e2\u00e8"
    + "\u00e9\u00eb\u00ea\u00ec\u00ed\u00ef"
    + "\u00ee\u00f2\u00f3\u00f6\u00f4\u00f9"
    + "\u00fa\u00fc\u00fb\u00f1\u00e7";
    
    var without = "aaaaeeeeiiiioooouuuunc";
    
    var map = {'@': ' at ', '\u20ac': ' euro ', 
    '$': ' dollar ', '\u00a5': ' yen ',
    '\u0026': ' and ', '\u00e6': 'ae', '\u0153': 'oe'};
    
    return string
    // Handle uppercase characters
    .toLowerCase()
    
    // Handle accentuated characters
    .replace(
        new RegExp('[' + accents + ']', 'g'),
        function (c) { return without.charAt(accents.indexOf(c)); })
    
    // Handle special characters
    .replace(
        new RegExp('[' + keys(map).join('') + ']', 'g'),
        function (c) { return map[c]; })
    
    // Dash special characters
    .replace(/[^a-z0-9]/g, '-')
    
    // Compress multiple dash
    .replace(/-+/g, '-')
    
    // Trim dashes
    .replace(/^-|-$/g, '');
}

function generateNameID(string) {
    //  var accents = "àáäâèéëêìíïîòóöôùúüûñç";
        var accents = "\u00e0\u00e1\u00e4\u00e2\u00e8"
        + "\u00e9\u00eb\u00ea\u00ec\u00ed\u00ef"
        + "\u00ee\u00f2\u00f3\u00f6\u00f4\u00f9"
        + "\u00fa\u00fc\u00fb\u00f1\u00e7";
        
        var without = "aaaaeeeeiiiioooouuuunc";
        
        var map = {'@': ' at ', '\u20ac': ' euro ', 
        '$': ' dollar ', '\u00a5': ' yen ',
        '\u0026': ' and ', '\u00e6': 'ae', '\u0153': 'oe'};
        
        return string
        // Handle uppercase characters
        .toLowerCase()
        
        // Handle accentuated characters
        .replace(
            new RegExp('[' + accents + ']', 'g'),
            function (c) { return without.charAt(accents.indexOf(c)); })
        
        // Handle special characters
        .replace(
            new RegExp('[' + keys(map).join('') + ']', 'g'),
            function (c) { return map[c]; })
        
        // Dash special characters
        .replace(/[^a-z0-9]/g, '_')
        
        // Compress multiple dash
        .replace(/-+/g, '_')

        // Compress multiple underscore
        .replace(/_+/g, '_')
        
        // Trim dashes
        .replace(/^-|-$/g, '')

        // Trim underscore
        .replace(/^_|_$/g, '');
    }


function stripHtml(html){
    // Create a new div element
    var temporalDivElement = document.createElement("div");
    // Set the HTML content with the providen
    temporalDivElement.innerHTML = html;
    // Retrieve the text property of the element (cross-browser support)
    return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

/*
    99999999999999999999999999999999
    99999999999999999999999999999999
    99999999999999999999999999999999
*/

function getTemplateParameterFromString(templateString) {
    var temStringArray = templateString.split(" ");
    var templateParam = "";
    var templateParams = [];


    if (temStringArray.length <= 0) {
        return templateParams;
    }

    if (temStringArray.length > 0) {
        for (i=0; i < temStringArray.length; i++) {
            templateParam = validateTemplateParam(temStringArray[i]);
            if (templateParam.isValid) {
                templateParams.push(removePunctuationSymbols(templateParam.value));
                
            }
        }
        return templateParams.join(', ');;
    }
}

function validateTemplateParam(word) {
    if (word.charAt(0) === "#") {
        return {
            'isValid': true,
            'value': word
        }
    } else {
        return {
            'isValid': false,
            'value': word
        }
    }
}

function getCKEditorContent(textAreaID) {
    var message = CKEDITOR.instances[textAreaID].getData();
        message = message.replace(/[\n\r]+/g, ' ');
        message = message.replace('<html> <head> <title></title> </head> <body>', ' ');
        message = message.replace('</body> </html>', ' ');
    return message;
}

function buildSelectedContactList(mailListContainerID) {
    var contactListCount = getByID(mailListContainerID).childElementCount;
    if (contactListCount <= 0) {
        return {
            hasContact: false,
            list: [],
            message: 'No contact has been selected, please add contact to email list.'
        }
    } else {
        var listNodes = getByID(mailListContainerID).children;
        var contactList = [];

        for(i=0; i<listNodes.length; i++) {
            var contactID = listNodes[i].children[0].id;
            if (!contactList.includes(contactID)) {
                contactList.push(contactID);
            }
        }

        return {
            hasContact: true,
            list: contactList,
            message: ""
        }
    }
}

function buildEmailParameter() {
    getEmailParams();
    setTimeout(function(){
        var interval = setInterval(function(){
            if (emailParamsObject) {
                stopSetInterval(interval);
            }
        }, 1000);
    }, 2000);
}

function getEmailParams(type="") {
    $.confirm({
        title: 'Configure Email Params',
        content: `
            <form action="" class="formName" style="position: relative;">
                <h6 class="display_email_params" style="width: 100%; text-align: center; display: none;">
                    To create a params, type the name of the params and click add.
                </h6>
                <h6 class="email_params_instruction" style="width: 100%; text-align: center;">
                    Add email parameter by clicking Add Params button and complete the form as required.
                </h6>
                <div class="form-group display_email_params" style="display: none;">
                    <label>
                        <span class="label-text">Params Name</span>
                        <div style="width: 100%; display: flex;">
                            <div style="width: 70%">
                                <input id="params_name" class="form-control"/>
                            </div>
                            <div style="width: 30%">
                                &nbsp;&nbsp;<button id="add_params" type="button" class="btn btn-rounded btn-warning">Add</button>
                            </div>
                        </div>
                    </label>
                </div>
                <h4 style="width: 100%;">Email Params</h4>
                <fieldset id="params_group" style="width: 100%;">
                    
                </fieldset>
                <div style="position: absolute; right: 0; top: 0; visibility: hidden;">
                    <button id="params_form_submit" type="submit" class="btn btn-rounded btn-warning">Submit</button>
                </div>
            </form>
        `,

        buttons: {
            addParams: {
                text: 'Add Params',
                btnClass: 'btn-green',
                action: function (e) {
                    $('.display_email_params').css('display', 'block');
                    $('.email_params_instruction').css('display', 'none');
                    return false;
                }
            },
            formSubmit: {
                text: 'Get Params',
                btnClass: 'btn-blue',
                action: function (e) {
                    proceed = false;
                    emailParamsObject = undefined;
                    $('#params_form_submit').trigger('click');
                    if (!proceed) {
                        return false;
                    }
                }
            },
            cancel: function () {
                //close
            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                // jc.$$formSubmit.trigger('click'); // reference the button and click it
            });

            $('#add_params').on('click', function(e) {
                var paramName = undefined;
                if ($('#params_name').val() == "") {
                    $('#params_name').css('border', '1px solid #ff0000');
                    $('#params_name').siblings().remove('small');
                    $('#params_name').after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;Please enter a params name</small>');
                    return;
                } else {
                    paramName = generateNameID($('#params_name').val());
                    var params = `
                        <div class="form-group">
                            <label>${capitalizeWordsInAString($('#params_name').val())}</label> 
                            <input id="${paramName}" name="${paramName}" class="form-control" required>
                        </div>`;
                    $(this).parents('form').children('fieldset').prepend(params);
                    $('#params_name').val("");
                    $('.display_email_params').css('display', 'none');
                }
            });

            $('#params_form_submit').on('click', function(e) {
                e.preventDefault();

                var parent_section = $(this).parents('form').children('fieldset');
                var isValid = true;

                var inputs = parent_section.children("div").children('input');

                for (i=0; i<inputs.length; i++) {
                    if (inputs[i].value == "") {
                        isValid = false;
                        $('#' + inputs[i].id).css('border', '1px solid #aa0000');
                        $('#' + inputs[i].id).siblings().css('color', '#ff0000');
                        $('#' + inputs[i].id).siblings().remove('small');
                        $('#' + inputs[i].id).after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;This field is required</small>');   
                    } else {
                        $('#' + inputs[i].id).css('border', '1px solid #eee');
                        $('#' + inputs[i].id).siblings().css('color', '#666');
                        $('#' + inputs[i].id).siblings().remove('small');
                    }
                }

                if (!isValid) {
                    proceed = false;
                }

                if (isValid) {
                    proceed = true;
                    var paramsObject = {};
                    for (i=0; i<inputs.length; i++) {
                        paramsObject[inputs[i].id] = inputs[i].value;
                    }

                    emailParamsObject = paramsObject;
                }
            });
        }
    });
}

function removePunctuationSymbols(word) {
    return word
        .replace(",", '')
        .replace(".", '')
        .replace("?", '');
}

document.addEventListener('input', removeErrorColor);
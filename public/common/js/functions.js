function handleDocumentClickEvents(e) {
    
    if (e.target.tagName === "svg" || e.target.tagName === "path") {
        // Delete send to email list item
        if (getSVGClickTarget(e).classList.contains('delete_from_list')) {
            document.getElementById('mailing-list').removeChild(getSVGClickTarget(e).parentNode.parentNode);
        } 

        // Delete site attribute
        if(getSVGClickTarget(e).parentNode.classList.contains('delete-site-attribute')) {
            var itemID = getSVGClickTarget(e).parentNode.id;
            var deleteFactor = getSVGClickTarget(e).parentNode.getAttribute('data-delete_factor');
            var deteleURL = '/manager/site-attributes';
            makeAJAXDeleteRequest(deteleURL, itemID, deleteFactor, "errorMsg");
        }
    }     
}

function handleDocumentKeyUpEvents(e) {
    // display save button for site attribute update....
    if(getFormDataEditStatus(e)) {
        if (keyboardCombinationConsideredAsAnEdit(e)) {
            // Show save button on site attribute edit
            displayElementByID('save_site_attribute');
        }
        
    }
    
}

/* 

*/
function strReplaceText(textString, subStr, value) {
    var newStr
    newStr =  textString.replace(subStr, value);
    return newStr;
}

function addAnItemToAkrosoftCMSLocalStorage(key, itemValue) {
    var AkrosoftCMS = (JSON.parse(localStorage.getItem('AkrosoftCMS')));
    AkrosoftCMS[key] = itemValue;
    localStorage.setItem('appStore', JSON.stringify(AkrosoftCMS));
    return true;     
}

function updateAkrosoftCMSLocalStorage(akrosoftCMS) {
    var AkrosoftCMS = akrosoftCMS;
    localStorage.setItem('AkrosoftCMS', JSON.stringify(AkrosoftCMS));
    return true;     
}

function getAnItemFromAkrosoftCMSLocalStorage(itemName) {
    if (localStorage.getItem('AkrosoftCMS')) {
        var AkrosoftCMS = JSON.parse(localStorage.getItem('AkrosoftCMS'));
        return AkrosoftCMS[itemName];
    }
    alert(itemName + " does NOT exist in memory...");
}

function getAkrosoftCMSLocalStorage() {
    return (JSON.parse(localStorage.getItem('AkrosoftCMS')));
}
//  End localStorage Functionss

// A Function to manage flash message display from javascript end
function flashMessages(message, targetID, url="", type="#00aa00", duration=1500) {
    getByID(targetID).innerHTML = message;
    getByID(targetID).style.color = type;
    setTimeout(function(){
        getByID(targetID).innerHTML = "";
        if(url) {
            location.href = url;
        }
    }, duration)
}

function highLightAllFields(fields) {
    if (typeof(fields) === 'object') {
        for (i=0; i<fields.length; i++) {
            $('#' + fields[i]).css('border', '1px solid #FFA500');
            $('#' + fields[i]).siblings().css('color', '#FFA500');
            $('#' + fields[i]).siblings().remove('small');
            $('#' + fields[i]).after('<small style="color: #FFA500;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;Ensure that this field data is OK.</small>');
        }
        return true;
    }
    return false;
}

function getInputValidationStatus(e) {
    var ipAdress = e.target.value;
    var selector = '#' + e.target.id;

    if (!ipAdress) {
        $(selector).siblings().remove('small');
    }

    if (ipAdress) {
        var validationStatus = ValidateIPaddress(ipAdress);
        $(selector).siblings().remove('small');
        $(selector).after(`<small style="color: ${validationStatus.colorCode}; padding-top: 5px; width: 100%;">${validationStatus.msg}</small>`);
    }
}

function performChangeActionsForConnectionElement(e) {
    var selectedConnection = e.target.value;

    getByID('db_port').value = getPortNumber(selectedConnection);
    updateErrorColors('db_port');
}

function updateCMSConfigurationSummary() {
    var summaryDatetails = getCMSConfigurationSummaryData();

    getByID('connection_name').innerHTML = summaryDatetails.connection;
    getByID('host_name').innerHTML = summaryDatetails.host;
    getByID('port_number').innerHTML = summaryDatetails.port;
    getByID('database_name').innerHTML = summaryDatetails.database;
    getByID('username_db_user').innerHTML = summaryDatetails.db_admin;
    getByID('cms_admin_user_fullname').innerHTML = summaryDatetails.cms_admin_name;
    getByID('cms_admin_user_email').innerHTML = summaryDatetails.email;
}

function getCMSConfigurationSummaryData() {
    return {
        connection: getByID('db_connection').value,
        host: getByID('db_host').value,
        port: getByID('db_port').value,
        database: getByID('db_name').value,
        db_admin: getByID('db_admin_username').value,
        db_password: getByID('db_password').value,
        cms_admin_name: getByID('cms_admin_name').value,
        email: getByID('cms_admin_email').value,
        password: getByID('cms_password').value
    }
}

function validateDBConnectivityUsingAjaxSync(strUrl, conData) {
    makeSyncAJAXRequest(strUrl, conData);
}

function initialCMSConfigurationSetup() {  
    $('#akrosoft-cms-configure').submit();
}

// Handles AJAX call to initiate Akrosoft CMS configuration setup
$('#akrosoft-cms-configure').submit(function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/api/configure-cms',
        headers: {
            // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { formData: getCMSConfigurationSummaryData() },
        dataType: 'json',
        success: function(data){
            location.href = '/';
        },
        error: function(data, textStatus, errorThrown) {
            console.log("error");
        }    
    });
});

// Handles AJAX call to initiate site attribute image
$('form#upload_attribute_image').submit(function(e){
    e.preventDefault();
    
    $.ajax({
        type: 'POST',
        url: '/manager/upload-attributes-image',
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
                flashMessages(data.message, errorMsg, url="", type="#ff0000")
            }

            if (data.status) {
                flashMessages(data.message, errorMsg, url="", data.url);
            }
        },
        error: function(data, textStatus, errorThrown) {
            console.log("error");
        }    
    });
});

function generateSelectOptions(id, key, defaultText='<option value="" selected hidden>--- Select ---</option>', selectOptionObject=[]) {
    var selectOptions = defaultText;
    
    if (selectOptionObject) {
        selectOptionObject.map(option => {
            selectOptions += '<option value="'+ option[id] +'">' + option[key] + '</option>';
        });
        return selectOptions;
    }
    return null;
}

function selectAnItemFromACollectionByID(searchParams, collection) {
    var selectedItem = null;
    if (collection) {
        collection.map(item => {
            if (item.id == searchParams) {
                selectedItem = item;
            }
        });
    }
    return selectedItem;
}


/*
    0000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000

        Site Attribute Page Javascript Section

    0000000000000000000000000000000000000000000000000000000000
*/
function getFormDataEditStatus(events) {
    var inputs = document.getElementsByTagName('input');
    var formElementEdited = false;

    for (i=0; i<inputs.length; i++) {
        if (inputs[i].getAttribute('id') == events.target.id) {
            formElementEdited = true;
            break;
        }
    }
    return formElementEdited;
}

function updateSiteAttributeFormData(e) {
    var attributeCategories = getAnItemFromAkrosoftCMSLocalStorage('attributeCategories');
    var attributeCollections = getAnItemFromAkrosoftCMSLocalStorage('attributeCollections');

    var selectedAttributeCollection = selectAnItemFromACollectionByID(e.target.value, attributeCollections);
    if (selectedAttributeCollection) {
        var selectedAttributsCategory = selectAnItemFromACollectionByID(selectedAttributeCollection.category_id, attributeCategories);
        
        getByID('attr_category').value = selectedAttributeCollection.category_id;
        getByID('attr_label').value = selectedAttributeCollection.label;
        getByID('attr_desc').value = selectedAttributeCollection.description;
        if (getByID('attr_category').value == 4) {
            getByID('display_image').style.display = 'block';
        } else {
            getByID('display_image').style.display = 'none';
        }
        return true;
    }
    return false;
}

function updateSiteAttributeFormDataImageRefValue(e) {
    getByID('attr_value').value = getTextFromSelectObject(e.target);
}

function processSaveSiteAttribute(e) {
    e.preventDefault();
    var isFormValidated = validateFormData('form#site_attribute');

    if(isFormValidated) {
        makeAJAXRequest('/manager/site-attributes', getFormData('form#site_attribute'), 'errorMsg');
    }
}

function processUploadAttributeImage(e) {
    e.preventDefault();
    var isFormValidated = validateFormData('form#upload_attribute_image');

    if(isFormValidated) {
        $('form#upload_attribute_image').submit();  
    }
}

function updateEditedSiteAttributeFields(e) {
    e.preventDefault();

    var isFormValidated = validateFormData('form#site_attribute_edit_form');

    if(isFormValidated) {
        makeAJAXUpdateRequest('/manager/site-attributes', getFormData('form#site_attribute_edit_form'), 'errorMsg');
    }
}

function selectLogoToUpload(e) {
    $('#choose_logo').css('display', 'none');
    $('#upload_logo').css('display', 'inline'); 
    $('#temp_image_holder').fadeIn("fast").attr('src', URL.createObjectURL(e.target.files[0]));
}

/*
    0000000000000000000000000000000000000000000000000000000000
        End Site Attribute Page Javascript Section 
    0000000000000000000000000000000000000000000000000000000000
*/


/*
    0000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000

        Email Compose Page Javascript Section

    0000000000000000000000000000000000000000000000000000000000
*/

    function updateMailingList(e) {
        var elem = document.createElement('li');
        elem.setAttribute('class', 'mailing-list-item');
        elem.innerHTML = `<a href="#" style="color: #666; padding: 4px 10px;">
            akugbeode@yahoo.com &nbsp;
            <i class="far fa-times-circle delete_from_list" style="color: #ff0000"></i>
        </a>`;
        document.getElementById('mailing-list').appendChild(elem);
    }

    function showAddContactButton(e) {
        document.getElementById('add-contact-to-mailing-list').style.display = 'inline';
    }

    function removeAddContactButton(e) {
        document.getElementById('add-contact-to-mailing-list').style.display = 'none';
    }

/*
    0000000000000000000000000000000000000000000000000000000000
        End Email Compose  Page Javascript Section 
    0000000000000000000000000000000000000000000000000000000000
*/

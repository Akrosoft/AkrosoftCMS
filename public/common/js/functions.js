function handleDocumentClickEvents(e) {

    if (e.target.tagName === "svg" || e.target.tagName === "path") {
        // Delete send to email list item
        if (getSVGClickTarget(e).classList.contains('delete_from_list')) {
            document.getElementById('mailing_list').removeChild(getSVGClickTarget(e).parentNode.parentNode);
        } 

        // Delete site attribute
        if(getSVGClickTarget(e).parentNode.classList.contains('delete-site-attribute')) {
            var itemID = getSVGClickTarget(e).parentNode.id;
            var deleteFactor = getSVGClickTarget(e).parentNode.getAttribute('data-delete_factor');
            var deleteLabel = getSVGClickTarget(e).parentNode.getAttribute('data-label');
            var deteleURL = '/manager/site-attributes';

            $.confirm({
                title: deleteFactor === "image-attribute" ? "DELETE IMAGE ATTRIBUTE" : "DELETE SITE ATTRIBUTE",
                content: `Do you want to delete ${ deleteLabel } ${ deleteFactor === "image-attribute" ? "image" : "attribute"}?`,
                buttons: {
                    Yes: function () {
                        makeAJAXDeleteRequest(deteleURL, itemID, deleteFactor, "errorMsg");
                    },
                    No: function () {
                    }
                }
            });  
        }

        // Close Contact List Select Menu
        if(getSVGClickTarget(e).parentNode.id === 'close_contact_list_select') {
            if(getByID('contact_list_menu')) {
                getByID('contact_list_menu').style.display = 'none';
            }
        }

        // Delete Site Page Attribute
        if(getSVGClickTarget(e).parentNode.getAttribute('data-delete_factor') == 'delete-site-attribute-link') {
            deleteSitePageAttributeLink(e);
        }
    }  
    
    if (e.target.tagName === "A") {
        if(e.target.getAttribute('data-request') == 'contact_message') {
            getByID("original_header").style.display = "none";
            getByID("msg_body").style.backgroundColor = "#ffffff";
            getByID("msg_body").style.borderRadius = "0px";
            getByID("msg_body").style.color = "#696969";
            getByID("reply_header").style.display = "none";
            getByID("msg_reply_body").style.display = "none";
            getByID("reply_contact_message").innerHTML = "Reply Message";

            
            var contactID = e.target.id;
            var contacts = getAnItemFromAkrosoftCMSLocalStorage('contacts');
            var selectedContact = selectAnItemFromACollectionByID(contactID, contacts);

            if (getByID('msg_sender')) {
                getByID('msg_sender').innerHTML = `<strong style="padding: 10px 0;">Message from </strong><span style="font-style: italic; font-family: serif; font-size: 130%;">${ selectedContact.fullname }</span> 
                <span style="font-size: 80%;">&nbsp; sent on &nbsp;<span style="font-style: italic; font-family: serif; font-size: 130%;">${ formatDate(selectedContact.created_at, "Month as text") }</span></span>`;
            }

            if (getByID('contact_id')) {
                getByID('contact_id').value = selectedContact.id;
            }

            if (getByID('msg_body')) {
                getByID('msg_body').innerHTML = `${ selectedContact.message }`;
            }
        }

        if(e.target.getAttribute('data-request') == 'delete_contact') {
            var itemID = e.target.id;
            var deleteFactor = e.target.getAttribute('data-delete_factor');
            var deteleURL = '/manager/site-attributes';

            $.confirm({
                title: "DELETE CONTACT MESSAGE",
                content: `Do you want to delete message?`,
                buttons: {
                    Yes: function () {
                        makeAJAXDeleteRequest(deteleURL, itemID, deleteFactor, "errorMsg");
                    },
                    No: function () {
                    }
                }
            });
        }

        if(e.target.getAttribute('data-request') == 'edit_email_template') {
            var emailTempID = e.target.id;
            var emailTemplate = getAnItemFromAkrosoftCMSLocalStorage('emailTemplate');
            var selectedContact = selectAnItemFromACollectionByID(emailTempID, emailTemplate);

            if(getByID("template_id")) {
                getByID('template_id').value = selectedContact.id;
            }

            if(getByID("template_name")) {
                getByID('template_name').value = selectedContact.name;
            }

            if(getByID("template_subject")) {
                getByID('template_subject').value = selectedContact.subject;
            }

            if(getByID("email_template_body")) {
                CKEDITOR.instances['email_template_body'].setData(selectedContact.message); 
            }
        }

        if(e.target.getAttribute('data-delete_factor') == 'delete-site-attribute-link') {
            deleteSitePageAttributeLink(e);
        }
    }

    if (e.target.tagName === "INPUT") {
        if(e.target.id == "type_email"){
            getByID('display-add-contact').style.display = 'none';
            getByID('type_email_address').style.display = 'block';
        }

        if(e.target.id == "pick_email"){
            getByID('display-add-contact').style.display = 'block';
            getByID('type_email_address').style.display = 'none';
        }
    }

    if (e.target.tagName === "SELECT") {
        if (!e.target.id) {
            return;
        }
        if (isDynamicSelect(e.target.id)) {
            // alert("Yes");
        }
    }

    if (e.target.tagName === "BUTTON") {
        e.preventDefault();
        if (!e.target.id) {
            return;
        }
        if (isDynamicButton(e.target.id)) {
            var elementName = getCompenentName(e.target.id);
            var targetedSelectID = elementName + "_select";
            var targetedULID = elementName + "_links";
            var menuLinks = null;

            var isValid = validateSingleElement(targetedSelectID);

            if (isValid) {
                var formData = {
                    action: e.target.getAttribute("data-action"),
                    attribute_id: e.target.getAttribute("data-attribute_id"),
                    menu_id: $('#' + targetedSelectID).val(),
                    target_name: elementName
                };

                data = makeSyncAJAXRequest('/manager/site-pages-setup', formData);

                if (data.status) {
                    menuLinks = data.links;
                    var menus = getAnItemFromAkrosoftCMSLocalStorage('menus');
                    var element_attributes = getAnItemFromAkrosoftCMSLocalStorage('element_attributes');
                    var linkLI = "";

                    for (i=0; i < menuLinks.length; i++) {
                        menu = selectAnItemFromACollectionByID(parseInt(menuLinks[i].target_id, 10), menus);
                        attribute = selectAnItemFromACollectionByID(parseInt(menuLinks[i].attribute_id, 10), element_attributes)
                        if (menu) {
                            linkLI +=  `
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none;">
                                    <strong>${menu.label}</strong>
                                    <a href="#" class="btn btn-rounded btn-sm btn-danger" data-attribute_label="${ attribute.label }" data-delete_factor="delete-site-attribute-link" data-target_id="${ menuLinks[i].id }">
                                        Delete &nbsp; <i class="far fa-times-circle"></i>
                                    </a>
                                </li>
                                `;
                        }
                    }
                    $('#' + targetedULID).html(linkLI);
                }
            }
        }
    }
}

function deleteSitePageAttributeLink(events) {
    var itemID = null;
    var deleteFactor = null;
    var deleteLinkGroupLabel = null;
    var deteleURL = null;

    if (!(events.target.tagName === "svg" || events.target.tagName === "path")) {
        itemID = events.target.getAttribute('data-target_id');
        deleteFactor = events.target.getAttribute('data-delete_factor');
        deleteLinkGroupLabel = events.target.getAttribute('data-attribute_label');
        deteleURL = '/manager/site-attributes';
    }

    if (events.target.tagName === "svg" || events.target.tagName === "path") {
        itemID = getSVGClickTarget(events).parentNode.getAttribute('data-target_id');
        deleteFactor = getSVGClickTarget(events).parentNode.getAttribute('data-delete_factor');
        deleteLinkGroupLabel = getSVGClickTarget(events).parentNode.getAttribute('data-attribute_label');
        deteleURL = '/manager/site-attributes';
    }

    $.confirm({
        title: "DELETE " + deleteLinkGroupLabel.toUpperCase(),
        content: `Do you want to delete link?`,
        buttons: {
            Yes: function () {
                makeAJAXDeleteRequest(deteleURL, itemID, deleteFactor, 'errorMsg');  
            },
            No: function () {
            }
        }
    });
}

function getCompenentName(elementID) {
    
    if (!elementID) {
        return null;
    } else {
        var nameSplitArray = elementID.split('_');
        var returnName = "";
        if(nameSplitArray.length == 1) {
            return nameSplitArray;
        }
        for (i=0; i<(nameSplitArray.length-1); i++) {
            returnName += nameSplitArray[i];
            if (i < (nameSplitArray.length-2)) {
                returnName += '_';
            }
        }
        return returnName;
    }
}

function isDynamicSelect(targetID) {
    var splitID = targetID.split('_');

    if (splitID.length <= 1) {
        return false;
    } else {
        if (splitID[splitID.length - 1] == 'select') {
            return true;
        }
    }
    return false;
}

function isDynamicButton(targetID) {
    var splitID = targetID.split('_');

    if (splitID.length <= 1) {
        return false;
    } else {
        if (splitID[splitID.length - 1] == 'btn') {
            return true;
        }
    }
    return false;
}

function handleDocumentKeyUpEvents(e) {
    // display save button for site attribute update....
    if(getFormDataEditStatus(e)) {
        if (keyboardCombinationConsideredAsAnEdit(e)) {
            // Show save button on site attribute edit
            displayElementByID('save_site_attribute');
            displayElementByID('update_profile_detail_parent');
        }
        
    }
    
}

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
        } else {
            location.reload();
        }
    }, duration)
}

function flashMessagesWithoutReload(message, targetID, url="", type="#00aa00", duration=1500) {
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
            alert("Server Error.");
        }    
    });
});

// Handles AJAX call to initiate site attribute image
$('form#upload_attribute_image').submit(function(e){
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
                flashMessages(data.message, "errorMsg", "", type="#ff0000");
            }

            if (data.status) {
                flashMessages(data.message, "errorMsg", "/manager/site-attributes", data.url);
            }
        },
        error: function(data, textStatus, errorThrown) {
            $('.btn-close').click();
            flashMessages("Internal Server Error!!!", "errorMsg", "", type="#ff0000");
        }    
    });
});

function generateSelectOptions(id, key, defaultText='<option value="" selected hidden>--- Select ---</option>', selectOptionObject=[], filterParams=[]) {
    var selectOptions = defaultText;

    if (filterParams.length > 0) {
        if (selectOptionObject) {
            selectOptionObject.map(option => {
                if (option[filterParams[0]] == filterParams[1]) {
                    selectOptions += '<option value="'+ option[id] +'">' + option[key] + '</option>';
                }
            });
            return selectOptions;
        }
        return null;
    } else {
        if (selectOptionObject) {
            selectOptionObject.map(option => {
                selectOptions += '<option value="'+ option[id] +'">' + option[key] + '</option>';
            });
            return selectOptions;
        }
        return null;
    }
}

function generateSelectOptionsWithValueLabel(id, key, label, defaultText='<option value="" selected hidden>--- Select ---</option>', selectOptionObject=[], filterParams=[]) {
    var selectOptions = defaultText;
    if (selectOptionObject) {
        selectOptionObject.map(option => {
            selectOptions += `<option value="${option[id]}">${option[label]}  &nbsp;&nbsp;&lt;${option[key]}&gt;</option>`;
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

function selectItemsFromACollection(searchParams, collection) {
    var selectedItem = [];
    if (collection) {
        collection.map(item => {
            if (item.id == searchParams) {
                selectedItem.push(item);
            }
        });
    }
    return selectedItem;
}

function selectItemsFromACollectionByProperty(searchParams, property, collection) {
    var selectedItem = [];
    if (collection) {
        collection.map(item => {
            if (item[property] == searchParams) {
                selectedItem.push(item);
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
    var textareas = document.getElementsByTagName('textarea');
    var formElementEdited = false;

    for (i=0; i<inputs.length; i++) {
        if (inputs[i].getAttribute('id') == events.target.id) {
            formElementEdited = true;
            break;
        }
    }

    for (i=0; i<textareas.length; i++) {
        if (textareas[i].getAttribute('id') == events.target.id) {
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
    getByID('attr_value').value = getTextFromSelectObject(e.target, '<', '>');
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

function processUploadAdminProfileImage(e) {
    e.preventDefault();
    var isFormValidated = validateFormData('form#upload_admin_profile_image');

    if(isFormValidated) {
        makeAJAXUploadImageRequest('upload_admin_profile_image', 'errorMsg');
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

function selectProfileImageToUpload(e) {
    $('#choose_profile').css('display', 'none');
    $('#upload_profile').css('display', 'inline'); 
    $('#temp_profile_image_holder').fadeIn("fast").attr('src', URL.createObjectURL(e.target.files[0]));
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
    function showContactListDialogBox(e){
        var contacts = getAnItemFromAkrosoftCMSLocalStorage('contacts');
        var contactArray = [];
        var emailTracker = [];
        contacts.map(contact => {
            if (contactArray.length <= 0) {
                emailTracker.push(contact.email);
                contactArray.push(contact);
            } else {
                if ($.inArray(contact.email, emailTracker) == -1) {
                    emailTracker.push(contact.email);
                    contactArray.push(contact);
                }
            }
        });
        var selectOptions = "";
        for(var i=0; i<contactArray.length; i++) {
            selectOptions += `<option value="${contactArray[i].id}"><strong>${contactArray[i].fullname}</strong> &lt;${contactArray[i].email}&gt;</option>`;
        }

        getByID('add-contact-to-mailing-list').style.display = 'none';

        if(getByID('contact_list_menu')) {
            getByID('contact_list_menu').style.display = "inline-block";
            getByID('contact_list_select').innerHTML = selectOptions;
        }
    }

    function handleAddContactToEmail(e) {
        var contactID = e.target.value;
        var contacts = getAnItemFromAkrosoftCMSLocalStorage('contacts');
        var selectedContact = undefined;

        if(getByID('contact_list_menu')) {
            getByID('contact_list_menu').style.display = 'none';
        }

        contacts.map(contact => {
            if (contactID == contact.id) {
                selectedContact = contact;
            }
        });

        updateMailingList(selectedContact);
    }

    function updateMailingList(contact) {
        var elem = document.createElement('li');
        elem.setAttribute('class', 'mailing-list-item');
        elem.innerHTML = `<a id="${contact.id}" title="${contact.fullname}" href="#" style="color: #666; padding: 4px 10px;">
            ${contact.email} &nbsp;
            <i class="far fa-times-circle delete_from_list" style="color: #ff0000"></i>
        </a>`;
        document.getElementById('mailing_list').appendChild(elem);
    }

    function showAddContactButton(e) {
        if (getByID('contact_list_menu').style.display == 'inline-block') {
            if(getByID('add-contact-to-mailing-list')) {
                getByID('add-contact-to-mailing-list').style.display = 'none';
            }
        } else {
            if(getByID('add-contact-to-mailing-list')) {
                getByID('add-contact-to-mailing-list').style.display = 'inline';
            }
        } 
    }

    function removeAddContactButton(e) {
        if(getByID('add-contact-to-mailing-list')) {
            getByID('add-contact-to-mailing-list').style.display = 'none';
        }
        
    }

/*
    0000000000000000000000000000000000000000000000000000000000
        End Email Compose  Page Javascript Section 
    0000000000000000000000000000000000000000000000000000000000
*/

function updateSelectedSocialMediaLabel(e) {
    var attributeCollections = getAnItemFromAkrosoftCMSLocalStorage('attributeCollections');

    var selectedAttributeCollection = selectAnItemFromACollectionByID(e.target.value, attributeCollections);
    if (selectedAttributeCollection) {    
        getByID('user_social_label').value = selectedAttributeCollection.label;
        $('#user_social_label').css('border', '1px solid #eee');
        $('#user_social_label').siblings().css('color', '#666');
        $('#user_social_label').siblings().remove('small');
        return true;
    }
    return false;
}

function processAddUserSocialMediaAccount(e) {
    e.preventDefault();

    var isFormValidated = validateFormData('form#add_user_social_media_account');

    if(isFormValidated) {
        makeAJAXRequest('/manager/add-user-social-media-account', getFormData('form#add_user_social_media_account'), 'errorMsg');
    }
}

function processLoggedUserPasswordUpdate(e) {
    e.preventDefault();

    if(e.target.innerHTML == "Update Password") {
        var newPassword = "";
        var confirmNewPassword = "";
        var email = getByID('logged_user_email').value;

        if (getByID('new_password')) {
            newPassword = getByID('new_password').value;
        }
        
        if (getByID('confirm_password')) {
            confirmNewPassword = getByID('confirm_password').value;
        }

        if (newPassword == "" || newPassword == null || newPassword == undefined) {
            flashMessagesWithoutReload('New password field cannot be EMPTY.', 'password-errorMsg', '', '#ff0000');
        } else if (newPassword != confirmNewPassword) {
            flashMessagesWithoutReload('Password fields MUST match, try again.', 'password-errorMsg', '', '#ff0000');
        } else {
            $.ajax({
                type: 'POST',
                url: '/manager/update-password',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { _method: "PUT", newPassword, confirmNewPassword, email },
                dataType: 'json',
                success: function(data){
                    if(data.status) {
                        $('.btn-close').click();
                        flashMessages(data.message, 'errorMsg', '');   
                    } else {
                        flashMessagesWithoutReload(data.message, 'password-errorMsg', '', '#ff0000');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    flashMessagesWithoutReload('Server Error', 'password-errorMsg', '', '#ff0000');
                }
            });
        }
        // alert("Got you!!!");
        // return null;
    }

    if(e.target.innerHTML == "Authenticate User") {

        var email = getByID('logged_user_email').value;
        var password = getByID('current_password').value;

        $.ajax({
            type: 'POST',
            url: '/manager/update-password',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { email, password },
            dataType: 'json',
            success: function(data){
                if(data.status) {
                    $('.current-password').css('display', 'none');
                    $('.new-password').css('display', 'block');
                    e.target.innerHTML = "Update Password";
                    return null;
                } else {
                    flashMessagesWithoutReload(data.message, 'password-errorMsg', '', '#ff0000');
                }
            },
            error: function(data, textStatus, errorThrown) {
                flashMessagesWithoutReload('Server Error', 'password-errorMsg', '', '#ff0000');
            }
        });
    }
}

function processUpdateEditedUserProfileDetails(e) {
    e.preventDefault();
    var isFormValidated = validateFormData('form#edit_logged_user_details');

    if(isFormValidated) {
        makeAJAXUpdateRequest('/manager/update-logged-user-details', getFormData('form#edit_logged_user_details'), 'errorMsg');
    }
}

function updateContactUsEnquiryMessage(e) {
    
    e.preventDefault();

    makeAJAXRequest('/contact-us', getFormData('form#contact_us_form'), 'errorMsg');
}

function processContactReplyRequest(e) {
    
    e.preventDefault();

    var contactID = getByID('contact_id').value;
    var contacts = getAnItemFromAkrosoftCMSLocalStorage('contacts');
    var selectedContact = selectAnItemFromACollectionByID(contactID, contacts);

    if (e.target.innerHTML === 'Send Message') {
        var isFormValidated = true;
        var value = stripHtml(CKEDITOR.instances['reply_message'].getData()).replace(/[\n\r]+/g, ' ');

        if ( value === "") {
            isFormValidated = false;
            flashMessagesWithoutReload("Reply message MUST have content", "reply-email-errorMsg", "", "#ff0000");
            return;
        }

        if(isFormValidated) {
            var formData = {
                response_message: getCKEditorContent("reply_message"),
                id: getByID('contact_id').value
            };
            
            $('#reply_contact_message').prop( "disabled" );
            makeAJAXUpdateRequest('/manager/contact/reply-message', formData, 'errorMsg');
            $('#reply_contact_message').removeAttr('disabled');
        }
    }

    if (e.target.innerHTML === 'Reply Message') {
        getByID("msg_sender").innerHTML = `<strong style="padding: 10px 0;">You are replying </strong><span style="font-style: italic; font-family: serif; font-size: 110%;">${ selectedContact.fullname }</span>`;
        getByID("original_header").style.display = "block";
        getByID("msg_body").style.backgroundColor = "#f0f0f0";
        getByID("msg_body").style.borderRadius = "5px";
        getByID("msg_body").style.color = "#000000";
        getByID("reply_header").style.display = "block";
        getByID("msg_reply_body").style.display = "block";
        e.target.innerHTML = 'Send Message';

        if (selectedContact.response_id == 3) {
            e.target.setAttribute('disabled', true);
        }

        if (selectedContact.response_message) {
            CKEDITOR.instances['reply_message'].setData(selectedContact.response_message);
        } else {
            CKEDITOR.instances['reply_message'].setData("");
        }
    }
}

function getTemplateName(e) {
    
    e.preventDefault();

    getByID('template_name').value = generateNameID(e.target.value);
}

function processTemplateEmailSaveAction(e) {
    e.preventDefault();

    var isFormValidated = true;

    if (getByID('template_subject')) {
        if (getByID('template_subject').value === "") {
            isFormValidated = false;
            flashMessagesWithoutReload("Template Subject is required", "email-template-errorMsg", "", "#ff0000");
            return;
        } 
    }

    var value = stripHtml(CKEDITOR.instances['email_template_body'].getData()).replace(/[\n\r]+/g, ' ');

    if ( value === "") {
        isFormValidated = false;
        flashMessagesWithoutReload("Template Message is required", "email-template-errorMsg", "", "#ff0000");
        return;
    }

    if(isFormValidated) {
        var formData = {
            templateName: getByID('template_name').value,
            templateSubject: getByID('template_subject').value,
            templateParams: getByID('template_parameter').value,
            templateMessage: getCKEditorContent("email_template_body")
        };

        if (getByID('template_id').value !== "") {
            formData.templateID = getByID('template_id').value;
        }

        makeAJAXRequest('/manager/email-templates', formData, 'errorMsg');
    }
}

function handleBulkEmailSendRequest(e) {
    if(e.target.checked) {
        getByID('mailing_list').innerHTML = "";
        var elem = document.createElement('li');
        elem.setAttribute('class', '');
        elem.innerHTML =    `<a href="#" style="color: #666; padding: 4px 10px;">
                                &lt;&lt;<strong>Send email to all contact</strong>&gt;&gt;
                            </a>`;

        if (getByID('pick_email').checked) {
            getByID('add_contact_container').style.display = 'none';
        }
        
        if (getByID('pick_email').checked) {
            getByID('type_email_address').style.display = 'none';
        }
        
       
        getByID('mail_cc_container').style.display = 'none';

        getByID('send_email_message').innerHTML = `Send Bulk Email`;

        getByID('display_email_input_mode').style.visibility = 'hidden';

        getByID('mailing_list').appendChild(elem);
        getByID('mailing_list').setAttribute('disabled', true);

    } else {
        getByID('mailing_list').innerHTML = "";
        getByID('mailing_list').removeAttribute('disabled');
        
        if (getByID('pick_email').checked) {
            getByID('add_contact_container').style.display = 'inline';
        }
        
        if (getByID('pick_email').checked) {
            getByID('type_email_address').style.display = 'block';
        }
        getByID('mail_cc_container').style.display = 'block';

        getByID('send_email_message').innerHTML = `Send Email`;

        getByID('display_email_input_mode').style.visibility = 'visible';
    }
}

function handleSendComposedEmail(e) {
    e.preventDefault();
    isValid = true;
    var formData = {
        type: null,
        hasCTA: null,
        ctaURL: null,
        ctaText: null,
        subject: null,
        message: null,
        contactList: null,
        emailParameters: null
    };
        
    if (getByID('cta_url').value != "" && getByID('cta_text').value != "") {
        formData.hasCTA = true;
        formData.ctaURL = getByID('cta_url').value;
        formData.ctaText = getByID('cta_text').value;
    } else if (getByID('cta_url').value == "" && getByID('cta_text').value == "") {
        formData.hasCTA = false;
        formData.ctaURL = null;
        formData.ctaText = null;
    } else {
        if(getByID('cta_url').value == "") {
            var ctaURL = getByID('cta_url');
            $("#" + ctaURL.getAttribute('id')).css('border', '1px solid #aa0000');
            $("#" + ctaURL.getAttribute('id')).siblings().css('color', '#ff0000');
            $("#" + ctaURL.getAttribute('id')).siblings().remove('small');
            $("#" + ctaURL.getAttribute('id')).after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;This field is required</small>');
        }

        if(getByID('cta_text').value == "") {
            var ctaText = getByID('cta_text');
            $("#" + ctaText.getAttribute('id')).css('border', '1px solid #aa0000');
            $("#" + ctaText.getAttribute('id')).siblings().css('color', '#ff0000');
            $("#" + ctaText.getAttribute('id')).siblings().remove('small');
            $("#" + ctaText.getAttribute('id')).after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;This field is required</small>');
        }
        isValid = false;
        return;
    }

    if (getByID('mail_subject').value == "") {
        var emailSubject = getByID('mail_subject');
        $("#" + emailSubject.getAttribute('id')).css('border', '1px solid #aa0000');
        $("#" + emailSubject.getAttribute('id')).siblings().css('color', '#ff0000');
        $("#" + emailSubject.getAttribute('id')).siblings().remove('small');
        $("#" + emailSubject.getAttribute('id')).after('<small style="color: #ff0000;"><i class="fas fa-exclamation-circle" style="font-size: 130%;"></i> &nbsp;This field is required</small>');
        isValid = false;
        return;
    }

    if (isValid) {
        var value = stripHtml(CKEDITOR.instances['email-composer-body'].getData()).replace(/[\n\r]+/g, ' ');
        if (value == "") {
            var message = `Email is EMPTY, please compose your email message and try sending.`;
            flashMessagesWithoutReload(message, 'errorMsg', "", type="#ff0000");
            return;
        } else {
            formData.subject = getByID('mail_subject').value;
            formData.message = getCKEditorContent("email-composer-body");
            if (getByID('send_bulk_email').checked) {
                formData.type = 'bulk email';
                setTimeout(function(){
                    emailParamsObject = null;
                    buildEmailParameter();
                    var getEPInterval = setInterval(function(){
                        if (emailParamsObject) {
                            formData.emailParameters = emailParamsObject;
                            stopSetInterval(getEPInterval);
                            // perform the rest email sending process
                            makeAJAXRequest('/manager/email-compose', formData, 'errorMsg');
                        }
                    }, 1000);
                }, 3000);
            } else {
                if (getByID('pick_email').checked) {
                    formData.type = 'selected email list';
                    var listObject = buildSelectedContactList('mailing_list');
                    if (listObject.hasContact) {
                        formData.contactList = listObject.list;
                        setTimeout(function(){
                            emailParamsObject = null;
                            buildEmailParameter();
                            var getEPInterval = setInterval(function(){
                                if (emailParamsObject) {
                                    formData.emailParameters = emailParamsObject;
                                    stopSetInterval(getEPInterval);
                                    // perform the rest email sending process
                                    makeAJAXRequest('/manager/email-compose', formData, 'errorMsg');
                                }
                            }, 1000);
                        }, 3000);
                    } else {
                        
                    }
                } else if (getByID('type_email').checked) {
                    formData.type = 'single email';
                    if (getByID('mail_to').value == "") {
                        var message = 'Recipient email is EMPTY, please add recipient email address.';
                        flashMessagesWithoutReload(message, 'errorMsg', "", type="#ff0000");
                    } else {
                        setTimeout(function(){
                            emailParamsObject = null;
                            buildEmailParameter();
                            var getEPInterval = setInterval(function(){
                                if (emailParamsObject) {
                                    formData.contactList = getByID('mail_to').value;
                                    formData.emailParameters = emailParamsObject;
                                    stopSetInterval(getEPInterval);
                                    // perform the rest email sending process
                                    makeAJAXRequest('/manager/email-compose', formData, 'errorMsg');
                                }
                            }, 1000);
                        }, 3000);
                    }
                }
            }
        }
    }
}

function handleAddSiteMenuButtonClick(e) {
    e.preventDefault();

    getByID('add_site_menu').innerHTML = `<strong>Add Site Menu</strong>`;
}

function handleCreateSitePageButtonClick(e) {
    e.preventDefault();

    getByID('create_site_page_header').innerHTML = `<strong>Create Site Page</strong>`;
}

function handlePageTitleTextChange(e) {
    getByID('create_page_slug').value = generateSlug(e.target.value)
    $('#create_page_slug').css('border', '1px solid #eee');
    $('#create_page_slug').siblings().css('color', '#666');
    $('#create_page_slug').siblings().remove('small');
}

function handleCreateSitePageRequest(e) {
    e.preventDefault();

    var isFormValidated = validateFormData('create_site_page_form');

    if(isFormValidated) {
        makeAJAXRequest('/manager/site-pages', getFormData('create_site_page_form'), 'errorMsg')
    }
}

function updateSiteMenuPageSlugFormData(e) {
    var pageID = e.target.value;
    var pages = getAnItemFromAkrosoftCMSLocalStorage('pages');
    var selectedPage = selectAnItemFromACollectionByID(pageID, pages);

    getByID('page_slug').value = selectedPage.slug;
    $('#page_slug').css('border', '1px solid #eee');
    $('#page_slug').siblings().css('color', '#666');
    $('#page_slug').siblings().remove('small');
}

function toggleSiteMenuParentMenuFormData(e) {
    var selectedMenuType = e.target.value;

    if (selectedMenuType == 1) {
        getByID('display_parent_menu').style.display = 'none';
        $('#menu_id').css('border', '1px solid #eee');
        $('#menu_id').siblings().css('color', '#666');
        $('#menu_id').siblings().remove('small');
    } else if (selectedMenuType == 2) {
        getByID('display_parent_menu').style.display = 'block';
        $('#menu_id').css('border', '1px solid #eee');
        $('#menu_id').siblings().css('color', '#666');
        $('#menu_id').siblings().remove('small');

        if (getByID('menu_id')) {
            var defaultText = '<option value="" hidden selected> -- Select Parent Menu --</option>';
            var menus = getAnItemFromAkrosoftCMSLocalStorage('menus');
            getByID('menu_id').innerHTML = generateSelectOptions('id', 'label', defaultText, menus);
        }
    }
}

function handleUpdateSiteMenuRequest(e) {
    e.preventDefault();

    var isFormValidated = validateFormData('add_site_menu_form');

    if(isFormValidated) {
        makeAJAXRequest('/manager/site-menu', getFormData('add_site_menu_form'), 'errorMsg')
    }
}

function handleUpdateSelectedTemplateDependencies(e) {
    var menuDefaultText = '<option value="" hidden selected>-- Select Site Menu Style --</option>';
    var footerDefaultText = '<option value="" hidden selected>-- Select Site Footer Style --</option>';
    var menuThemeStyles = getThemeTemplateElements(e.target.value, 'menu');
    var FooterThemeStyles = getThemeTemplateElements(e.target.value, 'footer');
    $('#menu').html(generateSelectOptions('id', 'label', menuDefaultText, menuThemeStyles));
    $('#footer').html(generateSelectOptions('id', 'label', footerDefaultText, FooterThemeStyles));
    $('#menu_manual_attributes').html("");
    $('#menu_auto_attributes').html("");
    $('#footer_manual_attributes').html("");
    $('#footer_auto_attributes').html("");
    if (getByID('save_template_setting_btn_container')) {
        getByID('save_template_setting_btn_container').style.display = 'block';
    }
}

function getThemeTemplateElements(template_id, element_cat_name) {
    var element_categories = getAnItemFromAkrosoftCMSLocalStorage('element_categories');
    var template_elements = getAnItemFromAkrosoftCMSLocalStorage('template_elements');
    var foundItems = [];

    var catID = null;

    element_categories.map(item => {
        if (item.name == element_cat_name) {
            catID = item.id;
        }
    });

    if (catID) {
        template_elements.map(item => {
            if (item.template_id == template_id && item.category_id == catID) {
                foundItems.push(item);
            }
        });
    }

    return foundItems;
}

function handleUpdateSelectedMenuDependencies(e) {
    var elementID = e.target.value;
    var element_attributes = getAnItemFromAkrosoftCMSLocalStorage('element_attributes');
    var elementAttributes = selectItemsFromACollectionByProperty(elementID, "element_id", element_attributes);
    var elemAttrConfig = getElementAttributeConfiguration(elementAttributes);
    var labelAuto = 'Generic Site Attributes';
    var labelManual = 'Custom Menu Attribute';
    $('#' + e.target.id + '_manual_attributes').html(manualElementAttributesUI(elemAttrConfig[1], labelManual));
    $('#' + e.target.id + '_auto_attributes').html(autoElementAttributesUI(elemAttrConfig[0], labelAuto));
    var menus = getAnItemFromAkrosoftCMSLocalStorage('menus');
    if (menus) {
        if (elemAttrConfig[1]) {
            elemAttrConfig[1].forEach(item => {
                if (item.target == 'menu') {
                    $('#' + item.name + '_select').html(generateSelectOptions('id', 'label', '<option value="" selected hidden>-- Select Menu to Link --</option>', menus));
                }
            });
        }
    }

    if (getByID('save_template_setting_btn_container')) {
        getByID('save_template_setting_btn_container').style.display = 'block';
    }
}

function handleUpdateSelectedFooterDependencies(e) {
    var elementID = e.target.value;
    var element_attributes = getAnItemFromAkrosoftCMSLocalStorage('element_attributes');
    var elementAttributes = selectItemsFromACollectionByProperty(elementID, "element_id", element_attributes);
    var elemAttrConfig = getElementAttributeConfiguration(elementAttributes);
    var labelAuto = 'Generic Site Attributes';
    var labelManual = 'Custom Footer Attributes';
    $('#' + e.target.id + '_manual_attributes').html(manualElementAttributesUI(elemAttrConfig[1], labelManual));
    $('#' + e.target.id + '_auto_attributes').html(autoElementAttributesUI(elemAttrConfig[0], labelAuto));
    var menus = getAnItemFromAkrosoftCMSLocalStorage('menus');
    if (menus) {
        if (elemAttrConfig[1]) {
            elemAttrConfig[1].forEach(item => {
                if (item.target == 'menu') {
                    $('#' + item.name + '_select').html(generateSelectOptions('id', 'label', '<option value="" selected hidden>-- Select Menu to Link --</option>', menus));
                }
            });
        }
    }

    if (getByID('save_template_setting_btn_container')) {
        getByID('save_template_setting_btn_container').style.display = 'block';
    }
}

function autoElementAttributesUI(collection, label) {
    var auto_attributes = getAnItemFromAkrosoftCMSLocalStorage('auto_attributes');
    var autoUIBody = "";
    if (collection.length <= 0) {
        return "";
    }
    collection.map(item => {
        autoUIBody += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>${item.label}</strong>
                <span class="${ auto_attributes[item.target] ? 'text-success' : 'text-danger' }">${ auto_attributes[item.target] ? '<i class="far fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>' }</span>
            </li>
        `;
    });
        
    var autoUI = `<div class="panel-content" style="border: none;"> 
                        <div class="panel-subtitle"> 
                            <h5 class="h5 text-uppercase">${label}</h5> 
                        </div>
                        <ul class="list-group">
                            ${autoUIBody}
                        </ul>
                    </div>`;

    return autoUI;
}

function manualElementAttributesUI(collection, label) {
    var MaualUIBody = "";
    if (collection.length <= 0) {
        return "";
    }
    collection.map(item => {
        MaualUIBody +=  `<ul class="nav nav-tabs"> 
                        <li class="nav-item"> 
                            <a href="#tab01" data-toggle="tab" class="nav-link active bg-success text-white"><strong>${item.label}</strong></a> 
                        </li>
                    </ul> 
                    <div class="tab-content"> 
                        <div class="tab-pane fade show active" id="tab01">
                            ${ setManualInputType(item) }

                            <h5 class="h5 text-uppercase text-success"><strong style="text-decoration: underline;">Links</strong></h5> 

                            <ul class="list-group" id="${item.name + '_links'}" name="${item.name + '_links'}" style="border: none;">
                                ${ getItemAttributes(item) }
                            </ul> 
                        </div>
                    </div><br />`;
    });

    var manualUI = `<div class="panel-content" style="border: none;"> 
                        <div class="panel-subtitle"> 
                            <h5 class="h5 text-uppercase">${label}</h5> 
                        </div>
                        ${MaualUIBody}
                    </div>`;

    return manualUI;

}

function getItemAttributes(item, id="") {
    var menus = getAnItemFromAkrosoftCMSLocalStorage('menus');
    var manual_attribute_links = getAnItemFromAkrosoftCMSLocalStorage('manual_attribute_links');
    var linkLI = "";

    if (manual_attribute_links <= 0) {
        return "";
    }
    for (i=0; i < manual_attribute_links.length; i++) {
        if (manual_attribute_links[i].attribute_id == item.id) {
            menu = selectAnItemFromACollectionByID(parseInt(manual_attribute_links[i].target_id, 10), menus);
            if (menu) {
                linkLI +=  `
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none;">
                        <strong>${menu.label}</strong>
                        <a href="#" class="btn btn-rounded btn-sm btn-danger" data-attribute_label="${ item.label }" data-delete_factor="delete-site-attribute-link" data-target_id="${ manual_attribute_links[i].id }">
                            Delete &nbsp; <i class="far fa-times-circle"></i>
                        </a>
                    </li>
                    `;
            }
        }
    }
    
    return linkLI;
}

function setManualInputType(item) {

    var inputElement = "";

    if (item.target == 'menu') {
        inputElement = `
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <select  class="form-control" id="${item.name + '_select'}" name="${item.name + '_select'}">
                            <option selected hidden value="">-- Select Menu to Link --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button id="${item.name + '_btn'}" name="${item.name + '_btn'}" class="btn btn-rounded btn-success btn-block" data-action="update links" data-attribute_id="${ item.id }">Add Link</button>
                    </div>
                </div>
            </div>
        </div>
        `;
    }
    return inputElement;
}

function getElementAttributeConfiguration(collections) {
    var auto = [];
    var manual = [];

    if (!collections) {
        return [auto, manual];
    }

    collections.map(item => {
        if (item.configuration == 'auto') {
            auto.push(item);
        }

        if (item.configuration == 'manual') {
            manual.push(item);
        }
    });

    return [auto, manual];
}

function handleUpdateTemplateSettingRequest(e) {
    e.preventDefault();

    var isValid = true;

    isValid = validateSingleElement('template');
    isValid = validateSingleElement('menu');
    isValid = validateSingleElement('footer');

    if (isValid) {
        var formData = {
            action: 'update template settings',
            template: getByID('template').value,
            menu: getByID('menu').value,
            footer: getByID('footer').value
        };

        makeAJAXRequest('/manager/site-pages-setup', formData, 'errorMsg');
    }
}


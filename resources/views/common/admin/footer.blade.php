
<footer class="main--footer main--footer-light"> 
    <p>
      {!! isset($copyRight) ? $copyRight : "" !!}
    </p>
  </footer> 
</main> 
</div>

{{-- Add Site Attribute Modal --}}
<div id="addSiteAttributeModal" class="modal fade" style="display: none;" aria-hidden="true"> 
  <div class="modal-dialog modal-lg"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <h4 class="h4" style="color: #e16123;"><strong>Add Site Attribute</strong></h4> 
        <button type="button" class="close" data-dismiss="modal">×</button> 
      </div>
      <div class="modal-body"> 
        <form id="site_attribute" action="#" method="POST" style="width: 90%; margin: 0 auto;">
          <h6 style="width: 100%; text-align: center; font-style: italic; color: #880000;">Please, complete all fields as REQUIRED</h6>
          <div class="col-md-12"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Site Attribute</span> 
                <select id="attr_parameter" name="attr_parameter" class="form-control" required>
                </select>
              </label> 
            </div>
          </div>
          <div class="col-md-12"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Category</span> 
                <select id="attr_category" name="attr_category" class="form-control" required>
                </select>
              </label> 
            </div>
          </div>
          <div class="col-md-12" id="display_image" style="display: none;"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Image</span> 
                <select id="attr_image" name="attr_image" class="form-control" required>
                </select>
              </label> 
            </div>
          </div>
          <div class="col-md-12"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Label</span> 
                <input type="text" id="attr_label" name="attr_label" placeholder="Website Name" class="form-control" required> 
              </label> 
            </div>
          </div>

          <div class="col-md-12"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Value</span> 
                <input type="text" id="attr_value" name="attr_value" placeholder="Akrosoft Inc." class="form-control" required> 
              </label> 
            </div>
          </div>

          <div class="col-md-12"> 
            <div class="form-group"> 
              <label> 
                <span class="label-text">Description</span> 
                <input type="text" id="attr_desc" name="attr_desc" class="form-control" value="This is the default site attribute description.">
              </label> 
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Close</button> 
        <button id="add_site_attribute" type="button" class="btn btn-rounded btn-success"><i class="far fa-save"></i>&nbsp;Save</button> 
      </div>
    </div>
  </div>
</div>
{{-- End Add Site Attribute Modal  --}}

{{--  Add Site Logo Modal --}}

<div id="addAttributeImage" class="modal fade show" style="display: none; padding-right: 19px;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-header"> 
          <h4 class="h4" style="color: #e16123;"><strong>Upload Site Icon</strong></h4> 
        <button type="button" class="close" data-dismiss="modal">×</button> 
      </div>
      <div class="modal-body"> 
        <div class="container-fluid">
          <div style="width: 100%; text-align: center;">
            <img id="temp_image_holder" src="{{ asset('/storage/images/uploads/default.png') }}" alt="" style="height: 200px; width: 200px; border: 1px solid #e0e0e0; border-radius: 10px;">
          </div>
          <div style="width: 100%; text-align: center;">
            <form id="upload_attribute_image" action="" method="POST" enctype="multipart/form-data">
              <input id="logo_file_upload" name="logo_file_upload" type="file" style="visibility: hidden;"> <br />
              <button type="button" id="choose_logo" name="choose_logo" class="btn btn-rounded btn-outline-success">Pick brand icon</button>
              <button type="button" id="upload_logo" name="upload_logo" class="btn btn-rounded btn-outline-success" style="display: none;"><i class="fas fa-upload text-warning"></i>&nbsp;&nbsp;Upload</button>
              <div class="col-md-12">
                <div class="form-group" style="text-align: left;"> 
                  <label> 
                    <span class="label-text">Icon Label</span> 
                    <input type="text" id="img_label" name="img_label" placeholder="Rose" class="form-control" required> 
                  </label> 
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- End Add Site Logo Modal --}}

{{-- Add Account Manager Modal --}}
<div id="manageAccountModal" class="modal fade" style="display: none;" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
      <div class="modal-content"> 
        <div class="modal-header"> 
          <h4 class="h4" style="color: #e16123;"><strong>Manager Account Manager</strong></h4> 
          <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Close</button> 
        </div>
        <div class="modal-body"> 
            <ul class="nav nav-tabs"> 
                <li class="nav-item"> 
                  <a href="#profile" data-toggle="tab" class="nav-link active show">Profile Image</a> 
                </li>
                <li class="nav-item"> 
                  <a href="#details" data-toggle="tab" class="nav-link">Profile Details</a> 
                </li>
                <li class="nav-item"> 
                  <a href="#social_medial" data-toggle="tab" class="nav-link">Social Media</a> 
                </li>
                <li class="nav-item"> 
                  <a id="password_link" href="#password" data-toggle="tab" class="nav-link">Password</a> 
                </li>
              </ul> 
              <div class="tab-content"> 
                <div class="tab-pane fade show active" id="profile"> 
                  <div class="container-fluid">
                    <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Update Profile Image</strong></h4> 
                    <div style="width: 100%; text-align: center;">
                      <img id="temp_profile_image_holder" src="{{ auth()->user()->profile_image }}" alt="" style="height: 200px; width: 200px; border: 1px solid #e0e0e0; border-radius: 10px; background: #444444;">
                    </div>
                    <div style="width: 100%; text-align: center;">
                      <form id="upload_admin_profile_image" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" id="upload_factor" name="upload_factor" value="Admin Profile">
                        <input id="profile_file_upload" name="profile_file_upload" type="file" style="visibility: hidden;"> <br />
                        <button type="button" id="choose_profile" name="choose_profile" class="btn btn-rounded btn-outline-success">Choose Profile Image</button>
                        <button type="button" id="upload_profile" name="upload_profile" class="btn btn-rounded btn-outline-success" style="display: none;"><i class="fas fa-upload text-warning"></i>&nbsp;&nbsp;Upload Image</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="details"> 
                  <div class="container-fluid">
                    <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Edit Profile Details</strong></h4> 
                    <div style="width: 100%; text-align: center;">
                      <form id="edit_logged_user_details" action="" method="POST">
                          <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Fullname</span> 
                                  <input type="hidden" id="edit_email" name="edit_email" value="{{ auth()->user()->email }}">
                                  <input type="text" placeholder="Enter Fullname e.g. Ramsy Noah Jr." value="{{ auth()->user()->name ? auth()->user()->name : ''}}" class="form-control" required id="edit_fullname" name="edit_fullname">
                                </label> 
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Date of Birth</span> 
                                  <input type="date" placeholder="Enter Date of Birth" value="{{ auth()->user()->dob ? auth()->user()->dob : ''}}" class="form-control" required id="edit_dob" name="edit_dob">
                                </label> 
                              </div>
                            </div>
                            <div class="col-md-6"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Mobile No.</span> 
                                  <input type="text" placeholder="Enter mobile number e.g. 07052858059" value="{{ auth()->user()->phone ? auth()->user()->phone : ''}}" class="form-control" required id="edit_phone" name="edit_phone">
                                </label> 
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Occupation</span> 
                                  <input type="text" placeholder="Enter job description" value="{{ auth()->user()->occupation ? auth()->user()->occupation : ''}}" class="form-control" required id="edit_occupation" name="edit_occupation">
                                </label> 
                              </div>
                            </div>
                            <div class="col-md-6"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Website</span> 
                                  <input type="text" placeholder="Enter web address if any" value="{{ auth()->user()->website ? auth()->user()->website : ''}}" class="form-control" required id="edit_website" name="edit_website">
                                </label> 
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Address</span> 
                                  <textarea placeholder="Enter contact address." class="form-control" required id="edit_address" name="edit_address">{{ auth()->user()->address ? auth()->user()->address : ''}}</textarea>
                                </label> 
                              </div>
                            </div>
                            <div class="col-md-12"> 
                              <div class="form-group" style="text-align: left;"> 
                                <label> 
                                  <span class="label-text">Say something about yourself</span> 
                                  <textarea placeholder="Say something wicked about yourself ...." class="form-control" required id="edit_bio" name="edit_bio">{{ auth()->user()->bio ? auth()->user()->bio : ''}}</textarea>
                                </label>
                              </div>
                            </div>
                            <div id="update_profile_detail_parent" class="col-md-12" style="display: none;"> 
                              <div class="form-group" style="text-align: center;"> 
                                <button id="update_profile_detail" type="submit" class="btn btn-rounded btn-outline-success">Update Profile Details</button>
                              </div>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="social_medial"> 
                  <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Add Social Media Account</strong></h4>
                  <div style="width: 100%; text-align: center;"> 
                    <form id="add_user_social_media_account"  action="#" method="POST" style="width: 90%; margin: 0 auto;">
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Social Media</span> 
                              <select  class="form-control" required id="user_social_media_type" name="user_social_media_type">
                              </select>
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Label</span> 
                              <input type="text"  placeholder="Social Media account" id="user_social_label" name="user_social_label" class="form-control" readonly required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Value</span> 
                              <input type="text"  placeholder="www/facebook.com/akrosoft-CMS" class="form-control" id="user_SM_url"   name="user_SM_url" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <input type="hidden" id="sm_user_id" name="sm_user_id" value="{{ auth()->user()->id }}">
                          <button type="submit" id="add_user_SM_account" class="btn btn-rounded btn-outline-success">Add Account</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="password"> 
                  <div class="container-fluid">
                    <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Change Password</strong></h4> 
                    <div style="width: 100%; text-align: center;">
                      <form  id="logged_user_password_update" action="" method="POST">
                          <div id="password-errorMsg" style="width: 100%; text-align: center; font-size: 22px;"></div> 
                        <div class="col-md-12 current-password">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Current Password</span> 
                              <input type="hidden" id="logged_user_email" name="logged_user_email" value="{{ auth()->user()->email }}">
                              <input type="password"  placeholder="Enter current password" class="form-control" id="current_password" name="current_password" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12 new-password" style="display: none;">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">New Password</span> 
                              <input type="password"  placeholder="Enter new password" class="form-control"  id="new_password" name="new_password"  required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12 new-password" style="display: none;">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Confirm Password</span> 
                              <input type="password" placeholder="Enter confirm password" class="form-control"  id="confirm_password" name="confirm_password"  required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button id="update_password" type="submit" class="btn btn-rounded btn-outline-success">Authenticate User</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer"> 
          {{-- <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Close</button>  --}}
          {{-- <button id="add_site_attribute" type="button" class="btn btn-rounded btn-success"><i class="far fa-save"></i>&nbsp;Save</button>  --}}
        </div>
      </div>
    </div>
  </div>
  {{-- End Add Account Manager Modal  --}}

  {{-- Add Email Template Modals --}}
  <div id="addEmailTemplateModal" class="modal fade" style="display: none;" aria-hidden="true"> 
      <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
          <div class="modal-header"> 
            <h4 class="h4" style="color: #e16123;"><strong>Add Email Template</strong></h4> 
            <button type="button" class="close" data-dismiss="modal">×</button> 
          </div>
          <div class="modal-body"> 
            <form id="email_template_form" action="#" method="POST">
                <div id="email-template-errorMsg" style="width: 100%; text-align: center; font-size: 22px;"></div> 
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="text-align: left;"> 
                      <label> 
                        <span class="label-text">Name</span> 
                        <input type="hidden" name="template_id" id="template_id">
                        <input type="text" placeholder="" class="form-control" required readonly id="template_name" name="template_name">
                      </label> 
                    </div>
                    <div class="form-group" style="text-align: left;"> 
                      <label> 
                        <span class="label-text">Subject</span> 
                        <input type="text" placeholder="" class="form-control" required id="template_subject" name="template_subject">
                      </label> 
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" style="text-align: left;"> 
                    <label> 
                      <span class="label-text">Parameters</span> 
                      <textarea placeholder="" class="form-control" required readonly id="template_parameter" name="template_parameter"></textarea>
                    </label> 
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label> 
                    <span class="label-text">Message</span> 
                    <textarea name="email_template_body" id="email_template_body"></textarea>
                  </label> 
              </div>
            </form>
          </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Close</button> 
            <button id="process_create_email_template" type="button" class="btn btn-rounded btn-success"><i class="far fa-save"></i>&nbsp;Save</button> 
          </div>
        </div>
      </div>
    </div>
  {{-- End Add Email Template Modals --}}

  {{-- View Contact Message Modals --}}
  <div id="viewContactMessageModal" class="modal fade" style="display: none;" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
      <div class="modal-content"> 
        <div class="modal-header"> 
          <h4 class="h4" id="msg_sender" style="color: #e16123;"></h4> 
          <button type="button" class="close" data-dismiss="modal">×</button> 
        </div>
        <div class="modal-body"> 
          <input type="hidden" name="contact_id" id="contact_id">
          <div id="original_header" style="display: none; color: #e16123; font-weight: bolder;">Original Message:</div>
          <div id="msg_body" style="width: 96%; margin: 20px auto; padding: 20px;">

          </div>
          <div id="reply_header" style="display: none; color: #e16123; font-weight: bolder;">Reply:</div>
          <div id="msg_reply_body" style="display:none;">
            <form id="contact_reply_message" action="#" method="POST" style="margin: 20px 0;">
                <div id="reply-email-errorMsg" style="width: 100%; text-align: center; font-size: 22px;"></div> 
                <div class="col-md-12"> 
                  <div class="form-group" style="text-align: left;"> 
                    <label> 
                       <textarea placeholder="Reply Message ..." class="form-control" required id="reply_message" name="reply_message">{{ auth()->user()->address ? auth()->user()->address : ''}}</textarea>
                    </label> 
                  </div>
                </div>
            </form>
          </div>
        </div>
        <div class="modal-footer"> 
          <button id="reply_contact_message" type="button" class="btn btn-rounded btn-success">Reply Message</button> 
          <button type="button" class="btn btn-rounded btn-default btn-close" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- End View Contact Message Modals --}}

  <script src="{{ asset('admin/js/jquery.min.js') }}"></script> 
  <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script> 
  <script src="{{ asset('admin/js/all.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script> 
  <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script> 
  <script src="{{ asset('admin/js/raphael.min.js') }}"></script> 
  <script src="{{ asset('admin/js/morris.min.js') }}"></script> 
  <script src="{{ asset('admin/js/select2.min.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery-jvectormap.min.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery-jvectormap-world-mill.min.js') }}"></script> 
  <script src="{{ asset('admin/js/horizontal-timeline.min.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script> 
  <script src="{{ asset('admin/js/jquery.steps.min.js') }}"></script> 
  <script src="{{ asset('admin/js/dropzone.min.js') }}"></script> 
  <script src="{{ asset('admin/js/ion.rangeSlider.min.js') }}"></script> 
  <script src="{{ asset('admin/js/datatables.min.js') }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script>
    $('textarea#email-composer-body').ckeditor();
    $('textarea#email_template_body').ckeditor();
    $('textarea#reply_message').ckeditor();
  </script>
  <script src="{{ asset('admin/js/main.js') }}"></script>

  <script src="{{ asset('common/js/jquery-confirm.min.js') }}"></script>
  <script src="{{ asset('common/js/variables.js') }}"></script> 
  <script src="{{ asset('common/js/helpers.js') }}"></script> 
  <script src="{{ asset('common/js/functions.js') }}"></script>
  <script>

    // Manage Variable Element
      var attributeCollections = `<?php if(isset($attributeCollections)) { echo $attributeCollections->toJson();} ?>`;
      var attributeCategories = `<?php if(isset($attributeCategories)) { echo $attributeCategories->toJson();} ?>`;
      var siteAttributes = `<?php if(isset($siteAttributes)) { echo $siteAttributes->toJson();} ?>`;
      var attributeImages = `<?php if(isset($attributeImages)) { echo $attributeImages->toJson();} ?>`;
      var contacts = `<?php if(isset($contacts)) { echo $contacts->toJson();} ?>`;
      var emailTemplate = `<?php if(isset($emailTemplate)) { echo $emailTemplate->toJson();} ?>`;

      var AkrosoftCMS = getAkrosoftCMSLocalStorage();
      
      if (!AkrosoftCMS) {
        AkrosoftCMS = {};
      }

      AkrosoftCMS.attributeCollections = attributeCollections ? JSON.parse(attributeCollections) : [];
      AkrosoftCMS.attributeCategories = attributeCategories ? JSON.parse(attributeCategories) : [];
      AkrosoftCMS.siteAttributes = siteAttributes ? JSON.parse(siteAttributes) : [];
      AkrosoftCMS.attributeImages = attributeImages ? JSON.parse(attributeImages) : [];
      AkrosoftCMS.contacts = contacts ? JSON.parse(contacts) : [];
      AkrosoftCMS.emailTemplate = emailTemplate ? JSON.parse(emailTemplate) : [];
      
      updateAkrosoftCMSLocalStorage(AkrosoftCMS);
    

    

    $(".site-attribute").mouseenter(function(e) {
      if (e.target.className === "site-attribute") {
        e.target.style.border = "1px solid #eeeeee";
        e.target.style.background = "#f9f9f9";
        e.target.style.borderRadius = "6px";
        e.target.style.transition = "all ease-in 0.3s";
      }

      for (var i = 0; i < e.target.childNodes.length; i++) {
          if (e.target.childNodes[i].className == "delete-site-attribute") {
            e.target.childNodes[i].style.display = "block";
            break;
          }        
      }
    });

    $(".site-attribute").mouseleave(function(e) {
      if (e.target.className === "site-attribute") {
        e.target.style.border = "1px solid #ffffff";
        e.target.style.background = "#ffffff";
        e.target.style.transition = "all ease-out 0.3s";
      }

      for (var i = 0; i < e.target.childNodes.length; i++) {
        if (e.target.childNodes[i].className == "delete-site-attribute") {
          e.target.childNodes[i].style.display = "none";
          break;
        }        
      }
    });

    window.onload = function() {
      /* 
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000

      site attribute JS code
      */
      if (getByID('attr_parameter')) {
        var defaultText = '<option value="" hidden selected> -- Select Site Attribte --</option>';
        var attributeCollections = getAnItemFromAkrosoftCMSLocalStorage('attributeCollections');
        getByID('attr_parameter').innerHTML = generateSelectOptions('id', 'label', defaultText, attributeCollections);
      }

      if (getByID('attr_category')) {
        var defaultText = '<option value="" hidden selected> -- Select Attribte Category --</option>';
        var attributeCategories = getAnItemFromAkrosoftCMSLocalStorage('attributeCategories');
        getByID('attr_category').innerHTML = generateSelectOptions('id', 'name', defaultText, attributeCategories);
      }

      if (getByID('attr_image')) {
        var defaultText = '<option value="value" hidden selected> -- Select Image Ref --</option>';
        var attributeImages = getAnItemFromAkrosoftCMSLocalStorage('attributeImages');
        getByID('attr_image').innerHTML = generateSelectOptions('id', 'image_ref', defaultText, attributeImages);
      }

      if (getByID('user_social_media_type')) {
        var defaultText = '<option value="" hidden selected> -- Select Social Media Type --</option>';
        var attributeCollections = getAnItemFromAkrosoftCMSLocalStorage('attributeCollections');
        getByID('user_social_media_type').innerHTML = generateSelectOptions('id', 'label', defaultText, attributeCollections, ['category_id', 2]);
      }

      if (getByID('attr_parameter')) {
        getByID('attr_parameter').addEventListener('change', updateSiteAttributeFormData);
      }

      if (getByID('attr_image')) {
        getByID('attr_image').addEventListener('change', updateSiteAttributeFormDataImageRefValue);
      }

      if (getByID('add_site_attribute')) {
        getByID('add_site_attribute').addEventListener('click', processSaveSiteAttribute);
      }

      if (getByID('save_all_edited_site_attr')) {
        getByID('save_all_edited_site_attr').addEventListener('click', updateEditedSiteAttributeFields);
      }

      if (getByID('logo_file_upload')) {
        getByID('logo_file_upload').addEventListener('change', selectLogoToUpload);
      }

      if (getByID('upload_logo')) {
        getByID('upload_logo').addEventListener('click', processUploadAttributeImage);
      }

      if (getByID('add_user_SM_account')) {
        getByID('add_user_SM_account').addEventListener('click', processAddUserSocialMediaAccount);
      }

      $('#choose_logo').click(function(){
        $('#logo_file_upload').click();
      });

      /* 
      ends site attribute JS code

      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      */


      /* 
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000

      email compose JS code
      */

      // if (document.getElementById('add-contact-to-mailing-list')) {
      //   document.getElementById('add-contact-to-mailing-list').addEventListener('click', updateMailingList);
      // }

      if (document.getElementById('add-contact-to-mailing-list')) {
        document.getElementById('add-contact-to-mailing-list').addEventListener('click', showContactListDialogBox);
      }

      if (document.getElementById('display-add-contact')) {
        document.getElementById('display-add-contact').addEventListener('mouseenter', showAddContactButton);
      }

      if (document.getElementById('display-add-contact')) {
        document.getElementById('display-add-contact').addEventListener('mouseleave', removeAddContactButton);
      }

      /* 
      ends email compose JS code

      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      */


      /* 
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000
      0000000000000000000000000000000000000000

      admin user Profile JS code
      */

      if (getByID('profile_file_upload')) {
        getByID('profile_file_upload').addEventListener('change', selectProfileImageToUpload);
      }

      if (getByID('user_social_media_type')) {
        getByID('user_social_media_type').addEventListener('change', updateSelectedSocialMediaLabel);
      }

      if (getByID('upload_profile')) {
        getByID('upload_profile').addEventListener('click', processUploadAdminProfileImage);
      }

      if (getByID('update_password')) {
        getByID('update_password').addEventListener('click', processLoggedUserPasswordUpdate);
      }

      if (getByID('update_profile_detail')) {
        getByID('update_profile_detail').addEventListener('click', processUpdateEditedUserProfileDetails);
      }

      $('#choose_profile').click(function(){
        $('#profile_file_upload').click();
      });

      $('#password_link').click(function(){
          $('.new-password').css('display', 'none');
      })

      $(".topbar").css('visibility', 'hidden');

      $('.view-contact-btn').click(function() {
        if (getByID('reply_contact_message')) {
          getByID('reply_contact_message').removeAttribute('disabled');
        }
      });

      if (getByID('reply_contact_message')) {
        getByID('reply_contact_message').addEventListener('click', processContactReplyRequest);
      }

      if(getByID('template_subject')) {
        getByID('template_subject').addEventListener('input', getTemplateName);
      }

      if(getByID('process_create_email_template')) {
        getByID('process_create_email_template').addEventListener('click', processTemplateEmailSaveAction);
      }

      if(getByID('send_test_email')) {
        getByID('send_test_email').addEventListener('click', sendTestEmail);
      }

      if (getByID('email_template_body')) {
        CKEDITOR.instances['email_template_body'].on('change', function() {
          var value = stripHtml(CKEDITOR.instances['email_template_body'].getData()).replace(/[\n\r]+/g, ' ');
          getByID('template_parameter').innerHTML = getTemplateParameterFromString(value);
        });
      }

      if (getByID('send_bulk_email')) {
          getByID('send_bulk_email').addEventListener('click', handleBulkEmailSendRequest);
      }

      if (getByID('contact_list_select')) {
        getByID('contact_list_select').addEventListener('click', handleAddContactToEmail);
      }

      if (getByID('type_email')) {
        if(getByID('type_email').checked){
          getByID('display-add-contact').style.display = 'none';
          getByID('type_email_address').style.display = 'block';
        }
      }

      if (getByID('pick_email')) {
        if(getByID('pick_email').checked){
          getByID('display-add-contact').style.display = 'block';
          getByID('type_email_address').style.display = 'none';
        }
      }
    }

    if (getByID('send_email_message')) {
      getByID('send_email_message').addEventListener('click', handleSendComposedEmail);
    }

    document.addEventListener('keyup', handleDocumentKeyUpEvents);
    document.addEventListener('click', handleDocumentClickEvents);
  </script>
</body>
</html>
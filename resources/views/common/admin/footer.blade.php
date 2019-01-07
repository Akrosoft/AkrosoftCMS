
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
                  <a href="#social_medial" data-toggle="tab" class="nav-link">Social Media</a> 
                </li>
                <li class="nav-item"> 
                  <a href="#password" data-toggle="tab" class="nav-link">Password</a> 
                </li>
              </ul> 
              <div class="tab-content"> 
                <div class="tab-pane fade show active" id="profile"> 
                  <div class="container-fluid">
                    <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Update Profile Image</strong></h4> 
                    <div style="width: 100%; text-align: center;">
                      <img id="img_profile" src="{{ asset('/storage/images/profile/default.png') }}" alt="" style="height: 200px; width: 200px; border: 1px solid #e0e0e0; border-radius: 10px; background: #444444;">
                    </div>
                    <div style="width: 100%; text-align: center;">
                      <form id="upload_profile_image" action="" method="POST" enctype="multipart/form-data">
                        <input id="profile_file_upload" name="logo_upload" type="file" style="visibility: hidden;"> <br />
                        <button type="button" id="choose_profile" name="choose_logo" class="btn btn-rounded btn-outline-success">Choose Profile Image</button>
                        <button type="button" id="upload_profile" name="upload_logo" class="btn btn-rounded btn-outline-success" style="display: none;"><i class="fas fa-upload text-warning"></i>&nbsp;&nbsp;Upload Image</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="social_medial"> 
                  <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Add Social Media Account</strong></h4>
                  <div style="width: 100%; text-align: center;"> 
                    <form  action="#" method="POST" style="width: 90%; margin: 0 auto;">
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Social Media</span> 
                              <select  class="form-control" required>
                              </select>
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Label</span> 
                              <input type="text"  placeholder="Website Name" class="form-control" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12"> 
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Value</span> 
                              <input type="text"  placeholder="Akrosoft Inc." class="form-control" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit"  class="btn btn-rounded btn-outline-success">Add Account</button>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="password"> 
                  <div class="container-fluid">
                    <h4 class="h4" style="color: #444444; width: 100%; text-align: center; padding-bottom: 30px;"><strong>Change Password</strong></h4> 
                    <div style="width: 100%; text-align: center;">
                      <form  action="" method="POST">
                        <div class="col-md-12">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Current Password</span> 
                              <input type="password"  placeholder="Enter current password" class="form-control" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">New Password</span> 
                              <input type="password"  placeholder="Enter new password" class="form-control" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group" style="text-align: left;"> 
                            <label> 
                              <span class="label-text">Confirm Password</span> 
                              <input type="password" placeholder="Enter confirm password" class="form-control" required> 
                            </label> 
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-rounded btn-outline-success">Update Password</button>
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
  </script>
  <script src="{{ asset('admin/js/main.js') }}"></script>

  <script src="{{ asset('common/js/variables.js') }}"></script> 
  <script src="{{ asset('common/js/helpers.js') }}"></script> 
  <script src="{{ asset('common/js/functions.js') }}"></script>
  <script>

    // Manage Variable Element
    var validate = `<?php if(isset($attributeCollections)) { echo $attributeCollections->toJson();} ?>`;
    if (validate) {
      var AkrosoftCMS = getAkrosoftCMSLocalStorage();
      AkrosoftCMS.attributeCollections = JSON.parse(`<?php if(isset($attributeCollections)) { echo $attributeCollections->toJson();} ?>`);
      AkrosoftCMS.attributeCategories = JSON.parse(`<?php if(isset($attributeCategories)) { echo $attributeCategories->toJson();} ?>`);
      AkrosoftCMS.siteAttributes = JSON.parse(`<?php if(isset($siteAttributes)) { echo $siteAttributes->toJson();} ?>`);
      AkrosoftCMS.attributeImages = JSON.parse(`<?php if(isset($attributeImages)) { echo $attributeImages->toJson();} ?>`);
      updateAkrosoftCMSLocalStorage(AkrosoftCMS);
    }

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

      if (document.getElementById('add-contact-to-mailing-list')) {
        document.getElementById('add-contact-to-mailing-list').addEventListener('click', updateMailingList);
      }

      if (document.getElementById('display-add-contact')) {
        document.getElementById('display-add-contact').addEventListener('mouseenter', showAddContactButton);
      }

      if (document.getElementById('display-add-contact')) {
        document.getElementById('display-add-contact').addEventListener('mouseleave', removeAddContactButton);
      }
    }

    document.addEventListener('keyup', handleDocumentKeyUpEvents);
    document.addEventListener('click', handleDocumentClickEvents);
  </script>
</body>
</html>
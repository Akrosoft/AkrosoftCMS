@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Compose New Email</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                  <span>Manager&nbsp;>&nbsp;</span>Email Manager&nbsp;>&nbsp;</span>Compose
              </li>
            </ul>
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                    <div class="form-group pt-1 pb-1"> 
                      <label class="form-check"> 
                        <input type="checkbox" name="send_bulk_email" id="send_bulk_email" class="form-check-input"> 
                        <span class="form-check-label">Send to Contact List</span> 
                      </label> 
                    </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content"> 
      <div class="row gutter-20"> 
        <div style="width: 98%; position: relative; left: 1%; top: -10px; background: #fff; border-radius: 6px;">
          <div class="app_content col-lg-12"> 
              <div class="mail-compose"> 
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="mail-compose__title" style="padding-top: 20px; padding-bottom: 10px;">Compose New Message</h3> 
                  </div>
                  <div class="col-md-6 ">
                    <div class="col-md-10 form-inline mt-4 mr-5" id="display_email_input_mode"> 
                      <label class="form-radio ml-auto"> 
                        <input type="radio" id="type_email" name="email_input_mode" class="form-radio-input"> 
                        <span class="form-radio-label">Type Email Address</span> 
                      </label> 
                      <label class="form-radio ml-3"> 
                        <input type="radio" id="pick_email" name="email_input_mode" class="form-radio-input" checked> 
                        <span class="form-radio-label">Use Email Picker</span> 
                      </label> 
                    </div>
                  </div>
                </div>
                <form action="#" method="post"> 
                  <div class="form-group" id="display-add-contact" > 
                    To:
                    <div style="display: inline-block;">
                      <ul id="mailing_list" name="mailing_list" style="list-style: none; margin-left: -30px;">
                        {{-- Mailing List will be appended here!!! --}}
                      </ul>
                    </div>
                      &nbsp;
                    <div id="add_contact_container" style="display: inline; position: relative;">
                      <div id="contact_list_menu" style="display: none; width: 300px; max-height:200px; overflow: hidden; position: absolute; top: 0; background: #1c2324; border: 2px solid #282828; padding: 5px 0 0 0;">
                        <div class="form-group">
                          <label> 
                            <span class="label-text text-white">&nbsp;&nbsp;Pick contact email</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><span id="close_contact_list_select" class="text-danger"><i class="fa fa-times"></i></span></a>
                            <select id="contact_list_select" name="contact_list_select" multiple style="width: 100%; padding:0 5px; background: #1c2324; border: none; color: #ffffff;">
                            </select>
                          </label> 
                        </div>
                      </div>
                      <a href="#" class="btn btn-rounded btn-outline-success btn-sm" id="add-contact-to-mailing-list" name="add-contact-to-mailing-list" style="display: none;">
                        <i class="fas fa-user-plus"></i>
                      </a> 
                    </div>
                  </div>
                  <div class="form-group" id="type_email_address" style="display: none;"> 
                    <input type="email" name="mail_to" id="mail_to" placeholder="To:" class="form-control"> 
                  </div>
                  <div id="mail_cc_container" class="form-group"> 
                    <input type="text" name="mail_cc" id="mail_cc" placeholder="Cc:" class="form-control"> 
                  </div>
                  <div class="form-group"> 
                    <input type="text" name="mail_subject" id="mail_subject" placeholder="Subject:" class="form-control"> 
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <input type="text" name="cta_url" id="cta_url" placeholder="Call to action URL:" class="form-control"> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <input type="text" name="cta_text" id="cta_text" placeholder="Call to action text:" class="form-control"> 
                      </div>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <textarea name="" id="email-composer-body"></textarea>
                  </div>
                  <div class="form-group"> 
                    <button id="send_email_message" type="button" class="btn btn-rounded btn-success">Send Email</button>
                  </div>
                </form>
              </div>
          </div>
        </div>   
      </div>
    </section>
@endsection
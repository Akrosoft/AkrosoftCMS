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
                        <input type="checkbox" name="checkbox" value="1" class="form-check-input"> 
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
                <h3 class="mail-compose__title" style="padding-top: 20px; padding-bottom: 10px;">Compose New Message</h3> 
                <form action="#" method="post"> 
                  <div class="form-group" id="display-add-contact"> 
                    To:
                    <div style="display: inline-block;">
                      <ul id="mailing-list" name="mailing-list" style="list-style: none; margin-left: -30px;">
                        {{-- Mailing List will be appended here!!! --}}
                      </ul>
                    </div>
                      &nbsp;
                    <div class="btn-group mb-2" style="display: inline;"> 
                      <a href="#" class="btn btn-rounded btn-outline-success btn-sm" id="add-contact-to-mailing-list" name="add-contact-to-mailing-list" style="display: none;">
                        <i class="fas fa-user-plus"></i>
                      </a> 
                    </div>
                  </div>
                  <div class="form-group"> 
                    <input type="email" name="mail_cc" placeholder="Cc:" class="form-control"> 
                  </div>
                  <div class="form-group"> 
                    <input type="text" name="mail_subject" placeholder="Subject:" class="form-control"> 
                  </div>
                  <div class="form-group"> 
                    <textarea name="" id="email-composer-body"></textarea>
                  </div>
                </form>
              </div>
          </div>
        </div>   
      </div>
    </section>
@endsection
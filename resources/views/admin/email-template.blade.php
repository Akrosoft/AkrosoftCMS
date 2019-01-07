@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Email Template</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                  <span>Manager&nbsp;>&nbsp;</span>Email Manager&nbsp;>&nbsp;</span>Template
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                  <a role="button" href="#" style="margin-top: 10px;" class="btn btn-rounded btn-outline-success">Add Template</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content"> 
      <div class="row gutter-20"> 
        <div style="text-align: center; width: 100%; position: relative; margin-top: 100px;">
          <h1 style="text-align: center; width: 100%;">
            Email Template is <strong>empty</strong>.
          </h1>
          <a class="btn btn-rounded btn-success" href="#">Add Template</a>
        </div>   
      </div>
    </section>   
@endsection
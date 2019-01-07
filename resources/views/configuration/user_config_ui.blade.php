@extends('layouts.configuration')

@section('content')
<div class="row no-gutters"> 
    {{-- <div class="col-md-6"> 
        <div class="m-account--content-w bg--img" style="background-image: url(&quot;assets/img/account/content-bg.jpg&quot;);"> 
            <div class="m-account--content"> 
                <h2 class="h2">Don't have an account?</h2> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="http://themelooks.net/demo/dadmin/html/register.html" class="btn btn-rounded">Register Now</a> 
            </div>
        </div>
    </div> --}}
    <div class="col-md-12"> 
        <div class="m-account--form-w"> 
            <div class="m-account--form"> 
                <div class="logo"> 
                    <img src="./login_files/logo.png" alt=""> 
                </div>
                <form action="#" method="post"> 
                    <label class="m-account--title">Create Administrative User Account</label> 
                    <div class="form-group"> 
                        <label>Administrator Name</label>
                        <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
                    </div>
                    <div class="form-group"> 
                        <label>Email</label>
                        <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
                    </div>
                    <div class="form-group"> 
                        <label>Phone</label>
                        <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
                    </div>
                    <div class="form-group"> 
                        <label>Password</label>
                        <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
                    </div>
                    <div class="form-group"> 
                        <label>Confirm Password</label>
                        <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <a href="/summary-page" class="btn btn-rounded btn-outline-success">Continue</a>
                    </div>
                </form> 
                <div class="m-account--footer"> 
                    <p>&copy; 2018 Akrosoft</p>
                </div>
            </div>
        </div>
    </div>
@endsection
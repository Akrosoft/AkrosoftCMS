@extends('layouts.admin-headless')

@section('content')
<div class="wrapper"> 
    <div class="m-account-w bg--img" style=""> 
        <div class="m-account"> 
            <div class="row no-gutters"> 
                <div class="col-md-6"> 
                    <div class="m-account--content-w bg--img" style="background-image: url({{ isset($loginImage) ? $loginImage: "" }});"> 
                        <div class="m-account--content"> 
                            <h2 class="h2" style="color: #e16123;">{{ isset($name) ? $name : 'Akrosoft CMS'}}</h2> 
                            @if ($name === 'Akrosoft CMS')
                                <p style="color: #000;"><span style="text-decoration: underline; font-weight:bolder; color: darkred">Note</span>: &nbsp; <span style="color: goldenrod;">App details will be displayed once site parameters are updated.</span></p> 
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="m-account--form-w"> 
                        <div class="m-account--form"> 
                            <div class="logo"> 
                                <img src="" alt=""> 
                                <h2 class="h2" style="color: #e16123;">{{ isset($name) ? $name . ' Admin' : 'Akrosoft Admin'}}</h2>
                            </div>
                            <form action="{{ route('admin.login.submit') }}" method="POST"> 
                                {{ csrf_field() }}
                                <label class="m-account--title">Login to your account</label> 
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                        <div class="input-group-prepend"> 
                                            <i class="fas fa-user"></i> 
                                        </div>
                                        <input id="email" type="email" name="email" placeholder="Enter email address" class="form-control" autocomplete="off" required> 
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                        <div class="input-group-prepend"> 
                                            <i class="fas fa-key"></i> 
                                        </div>
                                        <input id="password" type="password" name="password" placeholder="Enter password" class="form-control" autocomplete="off" required> 
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="m-account--actions"> 
                                    <a href="#" class="btn-link">Forgot Password?</a> 
                                    <button type="submit" class="btn btn-rounded btn-info">Login</button> 
                                </div>
                                <div class="m-account--footer"> 
                                    <p>{!! isset($copyRight) ? $copyRight : "" !!}</p>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
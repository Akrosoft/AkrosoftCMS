@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Manager Profile</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Manager&nbsp;>&nbsp;</span>Profile
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                  <a role="button" href="#manageAccountModal"  style="margin-top: 10px;" class="btn btn-link" data-toggle="modal"><i class="fa fa-cog"></i>&nbsp;Manage Account</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content"> 
        <div class="row gutter-20"> 
            <div class="col-lg-8"> 
                <div class="panel profile-cover"> 
                    <div class="profile-cover__img"> 
                        <img style="background: #ffffff;" src="{{ auth()->user()->profile_image }}" alt=""> 
                        <h3 class="h3">{{ strtoupper(auth()->user()->name) }}</h3> 
                    </div>
                    <div class="profile-cover__action bg--img" data-overlay="0.3" style="background-image: url();"> 
                        <button class="btn btn-link"> 
                            .
                        </button> 
                        <button class="btn btn-link"> 
                            
                        </button> 
                    </div>
                    <div class="profile-cover__info"> 
                        <button class="btn btn-link">.</button> 
                        <ul class="nav"> 
                                @if($social_media_accounts->isNotEmpty())
                                @foreach($social_media_accounts as $account)
                                    <li>
                                        <a href="{{ $account->value }}">
                                            {!! $account->attributeCollection->icon !!}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href="#">
                                        .
                                    </a>
                                </li>
                            @endif
                        </ul> 
                        <button class="btn btn-link">.</button> 
                    </div>
                </div>
                <div class="panel" style="visibility: hidden;"> 
                    <div class="panel-heading"> 
                        <h3 class="panel-title">Activity Feed</h3> 
                    </div>
                </div>
            </div>
            <!-- Aside Aside -->
            <div class="col-lg-4"> 
                <div class="panel"> 
                    <div class="panel-heading"> 
                        <h3 class="panel-title">About Me</h3> 
                    </div>
                    <div class="panel-content panel-about"> 
                        <p>
                            {!! 
                                auth()->user()->bio == null ? 
                                '<a href="#" style="width: 100%; padding: 0 0 50px;">Say something about yourself ...<a>' :
                                auth()->user()->bio
                            !!}
                        </p>
                        <table> 
                            <tbody>
                                <tr> 
                                    <th><i class="fas fa-briefcase"></i>&nbsp;Occupation</th> 
                                    <td>
                                        {!! 
                                            auth()->user()->occupation == null ? 
                                            '<a href="#" style="width: 100%; padding: 0 0 50px;">Not Set<a>' :
                                            auth()->user()->occupation
                                        !!}
                                    </td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-birthday-cake"></i>&nbsp;Date of Birth</th> 
                                    <td>
                                        {!! 
                                            auth()->user()->dob == null ? 
                                            '<a href="#" style="width: 100%; padding: 0 0 50px;">Not Set<a>' :
                                            auth()->user()->dob
                                        !!}
                                    </td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-map-marker-alt"></i>&nbsp;Location</th> 
                                    <td>
                                        {!! 
                                            auth()->user()->address == null ? 
                                            '<a href="#" style="width: 100%; padding: 0 0 50px;">Not Set<a>' :
                                            auth()->user()->address
                                        !!}
                                    </td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-mobile-alt"></i>&nbsp;Mobile No.</th> 
                                    <td>
                                        {!! 
                                            auth()->user()->phone == null ? 
                                            '<a href="#" style="width: 100%; padding: 0 0 50px;">Not Set<a>' :
                                            '<a href="tel:' . auth()->user()->phone . '" class="btn-link">' . auth()->user()->phone . '</a>'
                                        !!}
                                    </td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-globe"></i>&nbsp;Website</th> 
                                    <td>
                                        {!! 
                                            auth()->user()->website == null ? 
                                            '<a href="#" style="width: 100%; padding: 0 0 50px;">Not Set<a>' :
                                            '<a href="mailto:' . auth()->user()->website . '" class="btn-link">' . auth()->user()->website . '</a>'
                                        !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
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
                    <div class="profile-cover__action bg--img" data-overlay="0.3" style="background-image: url(&quot;assets/img/covers/01_800x150.jpg&quot;);"> 
                        <button class="btn btn-link"> 
                            .
                        </button> 
                        <button class="btn btn-link"> 
                            
                        </button> 
                    </div>
                    <div class="profile-cover__info"> 
                        <button class="btn btn-link">.</button> 
                        <ul class="nav"> 
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
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
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem odit esse quae, et praesentium eligendi, corporis minima repudiandae similique voluptatum dolorem temporibus doloremque.
                        </p>
                        <table> 
                            <tbody>
                                <tr> 
                                    <th><i class="fas fa-briefcase"></i>Occupation</th> 
                                    <td>UI/UX Designer</td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-birthday-cake"></i>Date of Birth</th> 
                                    <td>13 June 1983</td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-map-marker-alt"></i>Locatoin</th> 
                                    <td>123 Lorem Steet, NY, United States.</td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-mobile-alt"></i>Mobile No.</th> 
                                    <td><a href="tel:7328397510" class="btn-link">732-839-7510</a></td>
                                </tr>
                                <tr> 
                                    <th><i class="fas fa-globe"></i>Website</th> 
                                    <td><a href="mailto:example.com" class="btn-link">example.com</a></td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Dashboard</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Dashboard</span>
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">
                  <canvas width="71" height="38" style="display: inline-block; width: 71px; height: 38px; vertical-align: top;">
                  </canvas>
                </p>
                <p class="summary--title">
                  This Month
                </p>
                <p class="summary--stats text-green">
                  2,371,527
                </p>
              </div>

              <div class="summary--item"> 
                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">
                  <canvas width="71" height="38" style="display: inline-block; width: 71px; height: 38px; vertical-align: top;">
                  </canvas>
                </p>
                <p class="summary--title">
                  Last Month
                </p>
                <p class="summary--stats text-orange">
                  2,527,371
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content"> 
      <div class="row gutter-20"> 
        <div class="col-md-4"> 
          <div class="panel"> 
            <div class="miniStats--panel"> 
              <div class="miniStats--header bg-darker"> 
                <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#2bb3c0">
                  <canvas width="109" height="30" style="display: inline-block; width: 109px; height: 30px; vertical-align: top;">
                  </canvas>
                </p>
                <p class="miniStats--label text-white bg-blue"> 
                  <i class="fa fa-level-up-alt"></i> 
                  <span>10%</span> 
                </p>
              </div>
              <div class="miniStats--body"> 
                <i class="miniStats--icon fa fa-user text-blue"></i> 
                <p class="miniStats--caption text-blue">
                  Monthly
                </p>
                <h3 class="miniStats--title h4">New Users</h3> 
                <p class="miniStats--num text-blue">
                  13,450
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4"> 
          <div class="panel"> 
            <div class="miniStats--panel"> 
              <div class="miniStats--header bg-darker"> 
                <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#e16123">
                  <canvas width="109" height="30" style="display: inline-block; width: 109px; height: 30px; vertical-align: top;">
                  </canvas>
                </p>
                <p class="miniStats--label text-white bg-orange"> 
                  <i class="fa fa-level-down-alt"></i> 
                  <span>10%</span> 
                </p>
              </div>
              <div class="miniStats--body"> 
                <i class="miniStats--icon fa fa-ticket-alt text-orange"></i> 
                <p class="miniStats--caption text-orange">
                  Monthly
                </p>
                <h3 class="miniStats--title h4">Tickets Answered</h3> 
                <p class="miniStats--num text-orange">
                  450
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4"> 
          <div class="panel"> 
            <div class="miniStats--panel"> 
              <div class="miniStats--header bg-darker"> 
                <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#009378">
                  <canvas width="109" height="30" style="display: inline-block; width: 109px; height: 30px; vertical-align: top;">
                  </canvas>
                </p>
                <p class="miniStats--label text-white bg-green"> 
                  <i class="fa fa-level-up-alt"></i> 
                  <span>10%</span> 
                </p>
              </div>
              <div class="miniStats--body"> 
                <i class="miniStats--icon fa fa-rocket text-green"></i> 
                <p class="miniStats--caption text-green">
                  Monthly
                </p>
                <h3 class="miniStats--title h4">Projects Launched</h3> 
                <p class="miniStats--num text-green">
                  3,130,300
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
@endsection
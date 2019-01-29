<aside class="sidebar ps ps--active-y" data-trigger="scrollbar">
        <div class="sidebar--profile"> 
          <div class="profile--img"> 
            <a href="#"> 
              <img style="background: #ffffff; width: 80px !important; height: 80px !mportant;" src="{{ auth()->user()->profile_image }}" alt="" class="rounded-circle"> 
            </a> 
          </div>
          <div class="profile--name"> 
            <a href="{{ route('manager.profile') }}" class="btn-link">
              {{ strtoupper(auth()->user()->name) }}
            </a> 
          </div>
        </div>

        <div class="sidebar--nav"> 
          <ul> 
            <li> 
              <ul> 
                <li class="active"> 
                  <a href="{{ route('admin.dashboard') }}"> 
                    <i class="fa fa-home"></i> 
                    <span>Dashboard</span> 
                  </a> 
                </li>
              </ul> 
            </li>
            <li class="is-dropdown"> 
              <a href="#">
                Site Page Manager
              </a> 
              <ul> 
                <li class=""> 
                  <a href="{{ route('manager.site-pages')}}"> 
                    <i class="fas fa-layer-group"></i>
                    <span>Site Pages</span> 
                  </a>  
                </li>
                <li class=""> 
                  <a href="{{ route('manager.page-sections') }}"> 
                    <i class="fas fa-toolbox"></i>
                    <span>Page Sections</span> 
                  </a>  
                </li>
                <li class=""> 
                  <a href="{{ route('manager.page-contents') }}"> 
                    <i class="fas fa-toolbox"></i>
                    <span> Section Contents</span> 
                  </a>  
                </li>
                <li class=""> 
                  <a href="{{ route('manager.attributes') }}"> 
                    <i class="fas fa-project-diagram"></i>
                    <span>Site Attributes</span> 
                  </a>  
                </li>
              </ul> 
            </li>
            <li class="is-dropdown"> 
              <a href="#">
                Contact Manager
              </a> 
              <ul> 
                <li class=""> 
                  <a href="{{ route('manager.contact-list') }}"> 
                    <i class="far fa-newspaper"></i> 
                    <span>Contact List</span> 
                  </a> 
                </li>
              </ul> 
            </li>
            <li class="is-dropdown"> 
              <a href="#">
                Email Manager
              </a> 
              <ul> 
                <li class=""> 
                  <a href="{{ route('manager.email-compose') }}"> 
                    <i class="fas fa-envelope"></i>
                    <span>Compose</span> 
                  </a>  
                </li>
                <li>
                  <a href="{{ route('manager.email-templates') }}"> 
                    <i class="far fa-copy"></i>
                    <span>Template List</span> 
                  </a> 
                </li>
                <li class="is-dropdown"> 
                  <a href="#"> 
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span> 
                  </a> 
                  <ul>
                    <li>
                      <a href="{{ route('manager.email-templates') }}"> 
                        <i class="far fa-copy"></i>
                        <span>Configure Email Paramater</span> 
                      </a> 
                    </li>
                    </ul>
                </li>
              </ul> 
            </li>
          </ul> 
        </div>

        <div class="sidebar--widgets"> 
          <div class="widget"> 
            <h3 class="h6 widget--title">Information Summary</h3> 
            <div class="summary--widget"> <div class="summary--item"> 
              <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38"data-color="#2bb3c0">
                <canvas width="107" height="38" style="display: inline-block; width: 107px; height: 38px; vertical-align: top;">
                </canvas>
              </p>
              <p class="summary--title">
                Daily Traffic
              </p>
              <p class="summary--stats">
                307.512
              </p>
            </div>

            <div class="summary--item"> 
              <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">
                <canvas width="107" height="38" style="display: inline-block; width: 107px; height: 38px; vertical-align: top;">
                </canvas>
              </p>
              <p class="summary--title">
                Average Usage
              </p>
              <p class="summary--stats">
                2,371,527
              </p>
            </div>
            <div class="summary--item"> 
              <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#cccccc">
                <canvas width="107" height="38" style="display: inline-block; width: 107px; height: 38px; vertical-align: top;">
                </canvas>
              </p>
              <p class="summary--title">
                Disk Usage
              </p>
              <p class="summary--stats">
                37.5%
              </p>
            </div>
            <div class="summary--item"> 
              <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">
                <canvas width="107" height="38" style="display: inline-block; width: 107px; height: 38px; vertical-align: top;">
                </canvas>
              </p>
              <p class="summary--title">
                CPU Usage
              </p>
              <p class="summary--stats">
              37.05-32
            </p>
          </div>
          <div class="summary--item"> 
            <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#ff4040">
              <canvas width="107" height="38" style="display: inline-block; width: 107px; height: 38px; vertical-align: top;">
              </canvas>
            </p>
            <p class="summary--title">
              Memory Usage
            </p>
            <p class="summary--stats">
              37.05%
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
      <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
      </div>
    </div>


    <div class="ps__rail-y" style="top: 0px; height: 693px; right: 0px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 272px;">
      </div>
    </div>
  </aside> 

  <main class="main--container" style="position: relative;">
      {{-- <div id="errorMsg" style="position: fixed; top: 140px;right: 7%; width: 71%; text-align: center; font-size: 22px;"></div> --}}
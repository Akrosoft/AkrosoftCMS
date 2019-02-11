@if($template_setting->value == 2)
{{--
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}
    @if($footer->element->name == 'canvas_default')
    {{--
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
    --}}
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="col_one_third">

                            <div class="widget clearfix">

                                <img src="{{ $footer->logo }}" alt="" class="footer-logo" style="width: 50px; height: 50px;">

                                <p>
                                    We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.
                                </p>

                                <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                    @if($footer->contact_info)
                                        <address>
                                            <strong>Head Office:</strong><br>
                                            {{ $footer->contact_info->address }}
                                        </address>
                                        <abbr title="Phone Number"><strong>Phone:</strong></abbr> {{ $footer->contact_info->phone }} <br />
                                        <abbr title="Email Address"><strong>Email:</strong></abbr> {{ $footer->contact_info->email  }} <br />
                                    @endif
                                </div>

                            </div>

                        </div>

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">

                                <h4>Links</h4>

                                <ul>
                                    @foreach($footer->menu_links as $index=>$ml)
                                        <li><a href="{{ $ml->menu->url }}">{ $ml->menu->label }}</a></li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>

                        <div class="col_one_third col_last">

                            <div class="widget clearfix">
                                <h4>Recent Posts</h4>

                                <div id="post-list-footer">
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>10th July 2014</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Total Downloads</h5>
                                </div>

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Clients</h5>
                                </div>

                            </div>

                        </div>

                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
                                jQuery("#widget-subscribe-form").validate({
                                    submitHandler: function(form) {
                                        jQuery(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                        jQuery(form).ajaxSubmit({
                                            target: '#widget-subscribe-form-result',
                                            success: function() {
                                                jQuery(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                jQuery('#widget-subscribe-form').find('.form-control').val('');
                                                jQuery('#widget-subscribe-form-result').attr('data-notify-msg', jQuery('#widget-subscribe-form-result').html()).html('');
                                                SEMICOLON.widget.notifications(jQuery('#widget-subscribe-form-result'));
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 clearfix bottommargin-sm">
                                    <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                                </div>
                                <div class="col-md-6 clearfix">
                                    <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        {!! $footer->copy_right !!}.<br>
                        <div class="copyright-links">
                            @foreach($footer->terms_policy_links as $index=>$tpl)
                                {{-- <a href="{{ $tpl->menu->url }}">{{ $tpl->menu->label }}</a>{{ (count($footer->menu_links) - 1) != $index ? __('/') }} --}}
                            @endforeach
                        </div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                        @if($footer->social_media)
                            @foreach($footer->social_media as $sm)
                                <a href="{{ $sm->value }}" class="social-icon si-small si-borderless nobottommargin si-{{ $sm->attributeCollection->name }}">
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                </a>
                            @endforeach
                        @endif
                        </div>

                        <div class="clear"></div>

                        @if($footer->contact_info)
                            <i class="icon-envelope2"></i> {{ $footer->contact_info->email }} <span class="middot">&middot;</span> 
                            <i class="icon-headphones"></i> {{ $footer->contact_info->phone }} <span class="middot">&middot;</span>
                        @endif
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->
    {{-- 
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
        canvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefaultcanvasdefault
    --}}
    @elseif($footer->element->name == 'canvas_simple_footer')
    {{-- this is footer 6 in Canvas Template --}}
    {{-- 
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
    --}}
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <img src="{{ $footer->logo }}" alt="" class="footer-logo" style="width: 50px; height: 50px;">

                        {!! $footer->copy_right !!}
                    </div>

                    <div class="col_half col_last tright">
                        <div class="copyrights-menu copyright-links fright clearfix" style="width: 100%;">
                            @if($footer->menu_links)
                            @foreach($footer->menu_links as $index=>$ml)
                                <a href="{{ $ml->menu->url }}">{{ $ml->menu->label }}</a>{{ (count($footer->menu_links) - 1) != $index ? __('/') : __('')}}
                            @endforeach
                            @endif
                        </div>
                        <div class="fright clearfix">
                        @if($footer->social_media)
                            @foreach($footer->social_media as $sm)
                                <a href="{{ $sm->value }}" class="social-icon si-small si-borderless nobottommargin si-{{ $sm->attributeCollection->name }}">
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                </a>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->
    {{-- 
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
        canvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefootercanvassimplefooter
    --}}
    @elseif($footer->element->name == 'canvas_sticky_footer')
    {{--
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
    --}}
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <img src="{{ $footer->logo }}" alt="" class="footer-logo" style="width: 50px; height: 50px;">

                        {!! $footer->copy_right !!}
                    </div>

                    <div class="col_half col_last tright">
                        @if($footer->menu_links)
                        <div class="copyrights-menu copyright-links fright clearfix">
                            @foreach($footer->menu_links as $index=>$ml)
                                <a href="{{ $ml->menu->url }}">{{ $ml->menu->label }}</a>{{ (count($footer->menu_links) - 1) != $index ? __('/') : __('') }}
                            @endforeach
                        </div>
                        @endif
                        <div class="fright clearfix">
                        @if($footer->social_media)
                            @foreach($footer->social_media as $sm)
                                <a href="{{ $sm->value }}" class="social-icon si-small si-borderless nobottommargin si-{{ $sm->attributeCollection->name }}">
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                    <i class="icon-{{ $sm->attributeCollection->name }}"></i>
                                </a>
                            @endforeach
                        @endif
                        </div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->
    {{-- 
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
        canvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfootercanvasstickyfooter
    --}}
    @endif
{{--
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('site/canvas/js/functions.js') }}"></script>

@elseif($template_setting->value == 1)
{{--
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}
    
    @if($footer->element->name == 'mono_classic_footer')
    {{-- 
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
    --}}
    <footer>
        <div class="footer bg-dark-lighter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <h3 class="no-margin">{{ $footer->logo }}</h3>
                    </div>
                    @if($footer->useful_links)
                    <div class="col-12 col-md-6 col-lg-3">
                        <h6 class="heading-uppercase">Useful Links</h6>
                        <ul class="list-icon list-icon-arrow">
                            @foreach($footer->useful_links as $ul)
                                <li><a href="{{ $ul->menu->url }}">{{ $ul->menu->label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($footer->additional_links)
                    <div class="col-12 col-md-6 col-lg-3">
                        <h6 class="heading-uppercase">Additional Links</h6>
                        <ul class="list-icon list-icon-arrow">
                            @foreach($footer->additional_links as $al)
                                <li><a href="{{ $al->menu->url }}">{{ $al->menu->label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($footer->contact_info)
                    <div class="col-12 col-md-6 col-lg-3">
                        <h6 class="heading-uppercase">Contact Info</h6>
                        <ul class="list-unstyled">
                            <li>{{ $footer->contact_info->address }}</li>
                            <li>{{ $footer->contact_info->email }}</li>
                            <li>{{ $footer->contact_info->phone }}</li>
                        </ul>
                    </div>
                    @endif
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer -->
        <div class="footer-bottom bg-dark">
            <div class="container">
                <div class="row">
                    @if(isset($footer->copy_right))
                    <div class="col-12 col-md-6 text-center text-md-left">
                        <p>{!! $footer->copy_right !!}</p>
                    </div>
                    @endif
                    @if($footer->social_media)
                    <div class="col-12 col-md-6 text-center text-md-right">
                        <ul class="list-horizontal-unstyled">
                            @foreach($footer->social_media as $sm)
                                <li><a href="{{ $sm->value}}" style="color: {{$sm->attributeCollection->color}}">{!!$sm->attributeCollection->icon!!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer-bottom -->
    </footer>
    {{-- 
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
        classicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassicclassic
    --}}
    @elseif($footer->element->name == 'mono_clean_footer')
    {{-- 
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
    --}}
    <footer>
        <div class="footer bg-dark-lighter">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3 text-center text-md-left order-md-1">
                        <h4 class="no-margin">{{ $footer->logo }}</h4>
                    </div>
                    @if($footer->social_media)
                    <div class="col-12 col-md-3 text-center text-md-right order-md-3">
                        <ul class="list-horizontal-unstyled">
                            @foreach($footer->social_media as $sm)
                                <li><a href="{{ $sm->value }}" style="color: {{$sm->attributeCollection->color}}">{!!$sm->attributeCollection->icon!!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($footer->menu_links)
                    <div class="col-12 col-md-6 text-center order-md-2">
                        <ul class="list-horizontal-unstyled">
                            @foreach($footer->menu_links as $ml)
                                <li><a href="{{ $ml->menu->url }}">{{ $ml->menu->label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer -->
        @if(isset($footer->copy_right))
        <div class="footer-bottom bg-dark">
            <div class="container text-center">
                <p>{!! $footer->copy_right !!}</p>
            </div><!-- end container -->
        </div><!-- end footer-bottom -->
        @endif
    </footer>
    {{-- 
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
        cleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleancleanclean
    --}}
    @elseif($footer->element->name == 'mono_logo_footer')
    {{-- 
        logologologologologologologologologologologologologologologologologologologologologologologo
        logologologologologologologologologologologologologologologologologologologologologologologo
        logologologologologologologologologologologologologologologologologologologologologologologo
    --}}
        <footer>
            <div class="footer bg-dark-lighter">
                <div class="container text-center">
                    <h3>{{ $footer->logo }}</h3>
                    @if($footer->social_media)
                    <ul class="list-horizontal-unstyled icon-lg margin-top-20">
                        @foreach($footer->social_media as $sm)
                            <li><a href="{{ $sm->value}}" style="color: {{$sm->attributeCollection->color}}">{!!$sm->attributeCollection->icon!!}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div><!-- end container -->
            </div><!-- end footer -->
            @if(isset($footer->copy_right))
            <div class="footer-bottom bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-left">
                            <p>{!! $footer->copy_right !!}</p>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end footer-bottom -->
            @endif
        </footer> 
    {{-- 
        logologologologologologologologologologologologologologologologologologologologologologologo
        logologologologologologologologologologologologologologologologologologologologologologologo
        logologologologologologologologologologologologologologologologologologologologologologologo
    --}}
    @endif

    {{-- ***** JAVASCRIPTS *****  --}}
    <!-- Libraries -->
    <script src="{{ asset('site/mono/assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/bootstrap/popper.min.js') }}"></script>
    <!-- Plugins -->
    <script src="{{ asset('site/mono/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/appear.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/easing.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/retina.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/countdown.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/jarallax/jarallax-video.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/magnific-popup/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site/mono/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('site/mono/assets/plugins/gmaps.min.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('site/mono/assets/js/functions.min.js') }}"></script>
{{--
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}
@endif

@if(isset($admin_preview))
    <div style="position: fixed; top: 40%; left: 0px; width: 100%; color: rgba(0, 0, 176, 0.2); text-align: center; font-size: 70px;">Admin Page Preview</div>
@endif
</body>
</html>
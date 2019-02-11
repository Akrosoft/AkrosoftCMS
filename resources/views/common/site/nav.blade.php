@if($template_setting->value == 2)
{{--canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}
<body class="stretched {{ $footer->element->name == 'canvas_sticky_footer' ? 'sticky-footer' : '' }}">
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="{{ $footer->logo }}"><img src="{{ $footer->logo }}" alt="Client Logo"></a>
                        <a href="/" class="retina-logo" data-dark-logo="{{ $footer->logo }}"><img src="{{ $footer->logo }}" alt="Client Logo"></a>
                    </div><!-- #logo end -->
    
    @if($menu->element->name == 'canvas_default_menu') 
        <!-- Primary Navigation
        ============================================= -->
        <nav id="primary-menu" class="dark">
            <ul>
                @if($menu->main_menus->isNotEmpty())
                @foreach($menu->main_menus as $main_menu)
                @if($main_menu->hasSubMenu($main_menu->id))
                    <li><a href="{{ $main_menu->url }}"><div>{{ $main_menu->label }}</div></a>
                    <ul>
                        @foreach($menu->sub_menus as $sub_menu)
                        @if($main_menu->id == $sub_menu->parent_id)
                        @if($sub_menu->hasSubMenu($sub_menu->id))
                            <li><a href="{{ $sub_menu->url }}"><div>{{ $sub_menu->label }}</div></a>
                            <ul>
                                @foreach($menu->sub_menus as $sub_sub_menu)
                                @if($sub_menu->id == $sub_sub_menu->parent_id)
                                    <li><a href="{{ $sub_sub_menu->url }}"><div>{{ $sub_sub_menu->label }}</div></a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @else
                            <li><a href="{{ $sub_menu->url }}"><div>{{ $sub_menu->label }}</div></a></li>
                        @endif
                        @endif
                        @endforeach
                    </ul>
                    </li>
                @else
                    <li><a href="{{ $main_menu->url }}"><div>{{ $main_menu->label }}</div></a></li>
                @endif
                @endforeach
                @endif
            </ul>
            <!-- Top Search
            ============================================= -->
            <div id="top-search">
                <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                <form action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                </form>
            </div><!-- #top-search end -->
        </nav><!-- #primary-menu end -->
    </div>
</div>

</header><!-- #header end -->
    @else
        {{ dd("Canvas Theme Menu NOT available!!!") }}
    @endif

{{--canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
--}}
@elseif($template_setting->value == 1)
{{--monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}
{{-- <body data-preloader="2"> --}}
<body>
    @if($menu->element->name == 'mono_absolute_fixed_menu') 
    {{--
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed 
    --}}
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-absolute navbar-fixed">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h5>{{ $footer->logo }}</h5>
                </a>
                <ul class="nav">
                    <!-- dropdown link 1 -->
                    @if($menu->main_menus->isNotEmpty())
                    @foreach($menu->main_menus as $main_menu)
                        @if($main_menu->hasSubMenu($main_menu->id))
                            <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="{{ $main_menu->url }}">{{ $main_menu->label }}</a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->sub_menus as $sub_menu)
                                        @if($main_menu->id == $sub_menu->parent_id)
                                            @if($sub_menu->hasSubMenu($sub_menu->id))
                                                <li class="sub-dropdown">
                                                    <a href="{{ $sub_menu->url }}">{{ $sub_menu->label }}</a>
                                                    <div class="sub-dropdown-menu">
                                                        @foreach($menu->sub_menus as $sub_sub_menu)
                                                            @if($sub_menu->id == $sub_sub_menu->parent_id)
                                                                <a href="{{ $sub_sub_menu->url }}">{{ $sub_sub_menu->label }}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @else
                                                <li><a href="{{ $sub_menu->url }}">{{ $sub_menu->label }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $main_menu->url }}">{{ $main_menu->label }}</a>
                            </li>
                        @endif
                    @endforeach
                    @endif
                </ul><!-- end nav -->
                <!-- Nav Toggle button -->
                <button class="nav-toggle-btn">
                    <span class="lines"></span>
                </button>
            </div><!-- end container -->
        </nav><!-- end navbar -->
    
        <!-- Page header -->
        <div class="section-xl bg-image parallax" style="background-image: url(../assets/images/agency-classic-bg.jpg)">
            <div class="bg-black-06">
                <div class="container text-center">
                    <h1 class="font-weight-light no-margin">Header Absolute Fixed</h1>
                </div><!-- end container -->
            </div>
        </div>
    </header>
    {{--
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed
        absolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixedabsolutefixed 
    --}}
    @elseif($menu->element->name == 'mono_header_sticky_menu')
    {{--
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
    --}}
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            @if($menu->mini_menu->isNotEmpty())
                            @foreach($menu->mini_menu as $mm)
                                <li><a href="{{ $mm->menu->url }}">{{ $mm->menu->label }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="list-horizontal-unstyled">
                            @foreach($footer->social_media as $sm)
                                <li><a href="{{ $sm->value}}" style="color: {{$sm->attributeCollection->color}}">{!!$sm->attributeCollection->icon!!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end header-top -->
        <!-- navbar -->
        <nav class="navbar navbar-sticky">
                <div class="container">
                        <a class="navbar-brand" href="#">
                            <h5>{{ $footer->logo }}</h5>
                        </a>
                        <ul class="nav">
                            <!-- dropdown link 1 -->
                            @if($menu->main_menus->isNotEmpty())
                            @foreach($menu->main_menus as $main_menu)
                                @if($main_menu->hasSubMenu($main_menu->id))
                                    <li class="nav-item nav-dropdown">
                                        <a class="nav-link" href="{{ $main_menu->url }}">{{ $main_menu->label }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach($menu->sub_menus as $sub_menu)
                                                @if($main_menu->id == $sub_menu->parent_id)
                                                    @if($sub_menu->hasSubMenu($sub_menu->id))
                                                        <li class="sub-dropdown">
                                                            <a href="{{ $sub_menu->url }}">{{ $sub_menu->label }}</a>
                                                            <div class="sub-dropdown-menu">
                                                                @foreach($menu->sub_menus as $sub_sub_menu)
                                                                    @if($sub_menu->id == $sub_sub_menu->parent_id)
                                                                        <a href="{{ $sub_sub_menu->url }}">{{ $sub_sub_menu->label }}</a>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ $sub_menu->url }}">{{ $sub_menu->label }}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $main_menu->url }}">{{ $main_menu->label }}</a>
                                    </li>
                                @endif
                            @endforeach
                            @endif
                        </ul><!-- end nav -->
                        <!-- Nav Toggle button -->
                        <button class="nav-toggle-btn">
                            <span class="lines"></span>
                        </button>
                    </div><!-- end container -->
        </nav><!-- end navbar -->
    
        <!-- Page header -->
        <div class="section-xl bg-image parallax" style="background-image: url(../assets/images/agency-classic-bg.jpg)">
            <div class="bg-black-06">
                <div class="container text-center">
                    <h1 class="font-weight-light no-margin">Header Sticky</h1>
                </div><!-- end container -->
            </div>
        </div>
    </header>
    {{--
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
        headerstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheaderstickyheadersticky
    --}}
    @endif
{{--monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
--}}
@endif
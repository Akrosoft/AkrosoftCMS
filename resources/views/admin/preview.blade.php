@extends('layouts.site')

@section('content')
<div id="page-content-container">
    @if($page->hasPageMenu())
        @include('admin.site.nav')
    @endif

    @if(!$page->hasPageSections())
        <main>
            ddddd
        </main>
    @else
        @foreach($page_sections as $section)
            @if($section->layout === "carousel")
                {{-- 
                    Carousel UI Code goes Here!!!
                --}}
            @elseif($section->layout === "hero section")
                {{-- 
                    Hero UI Code goes Here!!!
                --}}
            @elseif($section->layout === "3 grid section layout")
                {{-- 
                    3 grid section UI Code goes Here!!!
                --}}
            @elseif($section->layout === "4 grid section layout")
                {{-- 
                    4 grid section UI Code goes Here!!!
                --}}

                {{-- 00000000000000000000000000000000000000000 --}}

                {{-- 
                    Other UI Types will be added Here!!!!!
                --}}
            @endif
        @endforeach
    @endif

    @if($page->hasPageFooter())
        @include('admin.site.footer')
    @endif
</div>
@endsection
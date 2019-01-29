@extends('layouts.site')

@section('content')
<div class="container-fluid" style="max-height: 100vh; overflow-y: visible;">
    @if(!$page->hasSestions())
        <header style="width: 100%; heigth: 100px; background: #aaa;">

        </header>
        <main style="width: 100%; heigth: cal(100vh - 160px);">
            
        </main>
        <footer style="width: 100%; heigth: 60px; background: #aaa;">

        </footer>
    @else
        @foreach($page_sections as $section)
            @if($section->layout === "menu")
                {{-- 
                    Menu UI Code goes Here!!!
                --}}
            @elseif($section->layout === "carousel")
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
            @elseif($section->layout === "footer")
                {{-- 
                    4 grid section UI Code goes Here!!!
                --}}
            @endif
        @endforeach
    @endif
</div>
@endsection
@extends('layouts.site')

@section('content')
    @if($template_setting->value == 2)
    {{--
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    --}}
        
    {{--
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
        canvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvascanvas
    --}}
    @elseif($template_setting->value == 1)
    {{--
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    --}}
        
    {{--
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
        monomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomonomono
    --}}
    @endif
@endsection
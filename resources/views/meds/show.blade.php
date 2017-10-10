@extends('shared.master')
@section('title')
    {!! $med->title !!}
@endsection
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="bs-component">
            <div class="contenido">
                <h2 class="titulo well">{!! $med->title !!}</h2>
                                
                <img class="img-responsive center-block imgPrincipal" src="{!! Storage::url($med->urlImage) !!}" alt="{!! $med->title !!}">                
                <br>

                <h4><b>Grupo:</b> {!! $med->grupo !!}</h4>
                <h4><b>Actividad:</b> {!! $med->actividad !!}</h4>
                <p>{!! $med->description !!}</p>
            </div>
            <br>
            <div class="clearfix"></div>            
        </div>
    </div>
    
@endsection
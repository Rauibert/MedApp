@extends('shared.master')
@section('title','Medicamentos')

@section('content')
    <div class="container col-md-8 col-md-offset-2 col-xs-12">
        <div class="panel panelnel-default">
            <div class="panel-heading">
                <h2>Medicamentos</h2>
            </div>
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if($meds->isEmpty()){
                    <p>No hay medicamentos</p>
                }
            @else
               
                        @foreach($meds as $med)
                            

                            <div class="card border-secondary col-md-4">
                                <img class="card-img-top img-responsive center-block" src="{!! Storage::url($med->urlImage) !!}" alt="{!! $med->title !!}">
                                <div class="card-block">
                                    <h2 class="card-title">{!! $med->title !!}</h2>
                                    <p class="card-text">{!! $med->description !!}</p>
                                    <a href="{!! action('MedsController@show', $med->slug) !!}" class="btn btn-primary col-xs-offset-10 col-md-offset-9">Ver más</a>
                                </div>
                            </div>

                        @endforeach
                  
            @endif
        </div>
    </div>
@endsection
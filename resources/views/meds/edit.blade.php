@extends('shared.master')
@section('title','Editar medicamento')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">

            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
                
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Editar medicamento</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Título</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Titulo" name="title" value="{!! $med->title !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Descripción</label>
                        <div class="col-lg-10">
                            <textarea id="content" class="form-control" name="description" rows="8">{!! $med->description !!}</textarea>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="actividad" class="col-lg-2 control-label">Actividad</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="actividad" placeholder="Actividad" name="actividad" value="{!! $med->actividad !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-lg-2 control-label">Grupo</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="grupo" placeholder="Grupo" name="grupo" value="{!! $med->grupo !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="urlImage" class="col-lg-2 control-label">Imagen</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="urlImage" value="{!! $med->urlImage !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </fieldset>
            </form> 
        </div> 
    </div>
    @endsection
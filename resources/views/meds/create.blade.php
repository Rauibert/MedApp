@extends('shared.master')
@section('title','Agregar nuevos Medicamentos')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <form class="form-horizontal"  method="POST" enctype="multipart/form-data">

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
                <legend><h2>Agregar nuevo medicamento</h2></legend>
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Título</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="title" placeholder="Titulo" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Descripción</label>
                    <div class="col-lg-10">
                        <textarea id="description" class="form-control" name="description" rows="8"></textarea>
                        <span class="help-block">Descripción del medicamento</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="actividad" class="col-lg-2 control-label">Actividad</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="actividad" placeholder="Actividad" name="actividad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="group" class="col-lg-2 control-label">Grupo</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="grupo" placeholder="Grupo" name="grupo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="urlImage" class="col-lg-2 control-label">Imagen</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="urlImage">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </fieldset>
        </form>  
        <br><hr>

        <h2>Tabla de medicamentos</h2><br>

        <table class="table">
            <thead class="thead-inverse">
                <tr>
                <th>#</th>
                <th>Imágen</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Actividad</th>
                <th>Grupo</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($meds as $med)            
                <tr>
                    <th scope="row">{!! $med->id !!}</th>
                    <td><img class="img-responsive" src="{!! Storage::url($med->urlImage) !!}" alt="{!! $med->title !!}">  </td>
                    <td>{!! $med->title !!}</td>
                    <td class="descCorta">{!! $med->description !!}</td>
                    <td>{!! $med->actividad !!}</td>
                    <td>{!! $med->grupo !!}</td>
                </tr>
            @endforeach
                
            </tbody>
        </table>

    </div>

    

    @endsection
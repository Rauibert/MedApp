@extends('shared.master')
@section('title','Inicio') 
@section('content') 

  @if (Route::has('login'))
    <div class="top-right links">
      @if (Auth::check())
      <a href="{{ url('/home') }}">Home</a> @else
      <a href="{{ url('/login') }}">Login</a>
      <a href="{{ url('/register') }}">Register</a> @endif
    </div>
  @endif
  <div class="content">
    <div class="title m-b-md">
      <h1>Bienvenidos a MedApp</h1>
    </div>
  </div>

@endsection
@extends('layout.allog')
@section('form')
@if(!empty($successMsg))
  <div class="alert alert-danger"> {{ $successMsg }}</div>
@endif
<form method="post" action="{{ route('login') }}">
@csrf
    <div class="user-box">
      <input type="text" name="matricule" class="@error('matricule') is-invalid @enderror">
      <label>Matricule</label>
        @error('matricule')
            <div class="invalid-feedback" role="alert">
                <div class="alert alert-danger"> {{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="user-box">
      <input type="password" name="password" class="@error('password') is-invalid @enderror">
      <label>Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <div class="alert alert-danger"> {{ $message }}</div>
            </span>
        @enderror
    </div>
    <button type="submit" class="bout">
        {{ __('login') }}
    </button>
    <div id="erro">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <p class="dist">Etes vous un administrateur ? <span><a href="{{URL::route('logadmin')}}">Connexion</a></span></p>
  </form>
@endsection


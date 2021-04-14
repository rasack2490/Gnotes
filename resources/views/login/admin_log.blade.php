@extends('layout.allog')
@section('form')
@if(!empty($successMsg))
  <div class="alert alert-danger"> {{ $successMsg }}</div>
@endif
<form method="post" action="{{ route('admintreat') }}">
@csrf
    <div class="user-box">
      <input type="email" name="email" class="@error('email') is-invalid @enderror">
      <label>Email</label>
      @error('email')
            <div class="invalid-feedback" role="alert">
                <div class="alert alert-danger"> {{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="user-box">
      <input type="password" name="password" class="@error('password') is-invalid @enderror">
      <label>Password</label>
      @error('password')
            <div class="invalid-feedback" role="alert">
                <div class="alert alert-danger"> {{ $message }}</div>
            </div>
        @enderror
    </div>
    <button class="bout" type="submit">
        {{ __('login') }}
    </button>
    <div id="erro">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <p class="dist">Etes vous un eleve ? <span><a href="{{URL::route('log')}}">Connexion</a></span></p>
  </form>
@endsection


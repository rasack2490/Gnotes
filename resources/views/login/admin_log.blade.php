@extends('layout.allog')
@section('form')
<form>
    <div class="user-box">
      <input type="email" name="" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="" required="">
      <label>Password</label>
    </div>
    <a class="bout" href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
    <p class="dist">Etes vous un eleve ? <span><a href="inscription">Connexion</a></span></p>
  </form>
@endsection


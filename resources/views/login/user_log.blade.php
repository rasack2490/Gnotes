@extends('layout.allog')
@section('form')
<form>
    <div class="user-box">
      <input type="text" name="" required="">
      <label>Matricule</label>
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
    <p class="dist">Etes vous un administrateur ? <span><a href="inscription">Connexion</a></span></p>
  </form>
@endsection


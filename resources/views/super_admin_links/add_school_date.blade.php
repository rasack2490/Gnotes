@extends('layout.master')
@section('left_nav')
    @include('includes.super_admin.left_nav')
@endsection
@section('top_nav')
    @include('includes.super_admin.top_nav')
@endsection
@section('content')
@if(!empty($successMsg))
  <div class="alert alert-success mx-auto"> {{ $successMsg }}</div>
@endif
@if(!empty($errorMsg))
  <div class="alert alert-danger mx-auto"> {{ $errorMsg }}</div>
@endif
    <div class="container">
        <div class="card w-50">
            <div class="card-header">
            <i class="bi bi-plus-square"></i> Definir l'année scolaire
            </div>
            <div class="card-body">
                <div class="container">
                <form action="{{route('datayear')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputannee">Année</label>
                        <input type="text" class="form-control w-75 @error('annee') is-invalid @enderror" id="exampleInputannee" name="annee" >
                        <small id="emailHelp" class="form-text text-muted">la date doit avoir un format 2000-2001</small>
                        @error('annee')
                            <div class="invalid-feedback" role="alert">
                                <div class="alert alert-warning"> {{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="browser" class="d-block">Choisir le type de l'année scolaire:</label>
                        <input list="browsers" name="type" id="browser" class="form-control w-75 @error('type') is-invalid @enderror">
                        <datalist id="browsers">
                            @foreach($annee as $annee)
                                <option value="{{$annee->list_type}}">
                            @endforeach

                        </datalist>
                        @error('type')
                            <div class="invalid-feedback" role="alert">
                                <div class="alert alert-warning"> {{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

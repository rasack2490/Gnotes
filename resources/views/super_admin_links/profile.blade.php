@extends('layout.master')
@section('left_nav')
    @include('includes.super_admin.left_nav')
@endsection
@section('top_nav')
    @include('includes.super_admin.top_nav')
@endsection
@section('content')
    <div class="container mb-5">
    @if(Session::has('successMsg'))
        <div class="alert alert-success mx-auto"> {{Session::get('successMsg') }}</div>
    @endif
        <div class="card">
            <div class="card-header">
            <i class="bi bi-plus-square"></i> Ajouter un professeur principal
            </div>
            <div class="card-body">
                <form action="{{route('editprofile')}}" method="post"  enctype="multipart/form-data">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="small-12 medium-2 large-2 columns">
                                    <div class="circle">
                                    <!-- User Profile Image -->
                                        <img class="profile-pic" src="{{Session("info")->image}}">

                                        <!-- Default Image -->
                                        <!-- <i class="fa fa-user fa-5x"></i> -->
                                    </div>
                                    <div class="p-image">
                                    <i class="fa fa-camera upload-button"></i>
                                    <input class="file-upload" type="file" accept="image/*" name="profile">
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-6">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control mb-3" id="nom" value="{{Session("info")->nom}}" name="nom">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control mb-3" id="prenom"  value="{{Session("info")->prenom}}" name="prenom">
                                <label for="mail">Email</label>
                                <input type="email" id="mail" class="form-control mb-3"  value="{{Session("info")->email}}" name="email">
                                <label for="tel">Telephone</label>
                                <input type="text" id="tel" class="form-control mb-3"  value="{{Session("info")->numero}}" name="telephone">
                                <label for="role">Role</label>
                                <input type="text" id="role" class="form-control mb-3"  value="{{$role}}" name="role" readonly>
                                <label for="pass">Password</label>
                                <input type="text" id="pass" class="form-control mb-3"   name="pass1" >
                                <label for="pass1">Confirm Password</label>
                                <input type="text" id="pass1" class="form-control mb-3"   name="pass2" >

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-light">
                    <h5 class="ml-3">Enregistrer le : {{Session("info")->created_at}} </h5>
            </div>
        </div>
    </div>
@endsection

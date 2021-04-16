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
            <i class="bi bi-plus-square"></i> Ajouter un eleve
            </div>
            <div class="card-body">
                <form action="{{route('savestudent')}}" method="post"  enctype="multipart/form-data">
                @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="small-12 medium-2 large-2 columns">
                                    <div class="circle">
                                    <!-- User Profile Image -->
                                        <img class="profile-pic" src="assets/img_profile/user.svg">

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
                                <input type="text" class="form-control mb-3"  placeholder="Nom" name="nom">
                                <input type="text" class="form-control mb-3"  placeholder="Prenom" name="prenom">
                                <input type="email" class="form-control mb-3"  placeholder="Email" name="email">
                                <input type="text" class="form-control mb-3"  placeholder="Numero" name="telephone">



                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                    <label for="annee" class="d-block">Choisir l'année scolaire:</label>
                                    <input list="annees" name="annee" id="annee" class="form-control ">
                                    <datalist id="annees">
                                        @foreach($annee as $annee)
                                            <option value="{{$annee->liste_annee}}">
                                        @endforeach

                                    </datalist>

                                </div>
                                <div class="form-group">
                                    <label for="browser" class="d-block">Choisir la classe de l'eleve:</label>
                                    <input list="browsers" name="classe" id="browser" class="form-control ">
                                    <datalist id="browsers">
                                        @foreach($classe as $classe)
                                            <option value="{{$classe->list_classe}}">
                                        @endforeach

                                    </datalist>

                                </div>
                                <input type="text" class="form-control mb-3"  placeholder="Nationalite" name="nation">
                                <input type="text" class="form-control mb-3"  placeholder="Ville" name="ville">

                            </div>
                            <div class="col-lg-6">
                            <input type="text" class="form-control mb-3"  placeholder="Numero personne a prevenir en cas de besoin" name="numero">
                                <input type="text" class="form-control mb-3"  placeholder="Adresse" name="adresse">
                                <input type="text" class="form-control mb-3"  placeholder="Nom du pere" name="pere">
                                <input type="text" class="form-control mb-3"  placeholder="Nom de la mere" name="mere">
                                <input type="date" class="form-control mb-3"  placeholder="Naissance" name="naissance">
                                <div class="form-group">
                                    <label for="sex" class="d-block">Sexe:</label>
                                    <input list="sexes" name="sex" id="sex" class="form-control ">
                                    <datalist id="sexes">
                                            <option value="Homme">
                                            <option value="Femme">
                                    </datalist>

                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

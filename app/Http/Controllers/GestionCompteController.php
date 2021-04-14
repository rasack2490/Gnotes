<?php

namespace App\Http\Controllers;

use App\anneeScolaire;
use App\classe;
use App\typeAnnee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class GestionCompteController extends Controller
{
    //
    public function addprofpage(){
        $annee = anneeScolaire::all();
        $classe = classe::all();
        
        return view('super_admin_links.add_prof', ['annee'=>$annee, 'classe'=>$classe]);
    }
    public function addyear(){
        $annee = typeAnnee::all();

        return view('super_admin_links.add_school_date', ['annee'=>$annee]);
    }
    public function datayear(Request $request){
        $request->validate([
            'annee' => 'required|string|regex:/([0-9]{4}[-][0-9]{4})/',
            'type' => 'required|string',
        ]);
        $annee = new anneeScolaire();
        $annee->liste_annee = $request->annee;
        $annee->typeAn = $request->type;
        $error = $annee->save();
        $annee = typeAnnee::all();
        if($error == true){
            return view('super_admin_links.add_school_date', ['annee'=>$annee])->with('successMsg','l annee a bien ete definie.');
        }
        else{
            return view('super_admin_links.add_school_date', ['annee'=>$annee])->with('errorMsg','Quelques chose c est mal passe.');
        }
    }
    public function addprofform(Request $request){
        $request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:30',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:20',
            'classe' => 'required|string',
            'annee' => 'required|string',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       $store = 'assets/img_profile/'.$request->file('profile')->store('profile');
       Storage::disk('public')->put('filename', $store);
       $password = Str::random(3).''.rand( 10000, 99999 );
       $professeur = new User();
        $professeur->image = $store;
        $professeur->nom = $request->input('nom');
        $professeur->prenom = $request->input('prenom');
        $professeur->email = $request->input('email');
        $professeur->password = bcrypt($password);
        $professeur->numero = $request->input('telephone');
        $professeur-> role = false;
        $professeur->classe_id = $request->input('classe');
        $professeur->annee = $request->input('annee');
        $professeur->save();
        Session::flash('successMsg','le mot de passe de '.$professeur->prenom.' '.$professeur->nom.' est '.$password);
        return redirect()->route('addprof');
    }
    public function addstudent(){
        $annee = anneeScolaire::all();
        $classe = classe::all();
        return view('super_admin_links.add_eleve', ['annee'=>$annee, 'classe'=>$classe]);
    }
}

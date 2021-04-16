<?php

namespace App\Http\Controllers;

use App\anneeScolaire;
use App\classe;
use App\Eleve;
use App\EleveAnnee;
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
    public function savestudent(Request $request){
        $request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:30',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:20',
            'classe' => 'required|string',
            'annee' => 'required|string',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nation' => 'required|string',
            'ville' => 'required|string',
            'numero' => 'required|string',
            'adresse' => 'required|string',
            'pere' => 'required|string',
            'mere' => 'required|string',
            'naissance' => 'required|string',
            'sex' => 'required|string',
        ]);

        $store = 'assets/img_profile/'.$request->file('profile')->store('profile');
        Storage::disk('public')->put('filename', $store);
        $password = Str::random(3).''.rand( 10000, 99999 );
        //$matricule =

        if($request->input('sex') == 'Homme'){
            $sex = true;
        }
        else{
            $sex = false;
        }
        $eleve = new Eleve();
        $eleve->nom = $request->input('nom');
        $eleve->prenom =$request->input('prenom');
        $eleve->email = $request->input('email');
        $eleve->password = bcrypt($password);
        $eleve->image = $store;
        $eleve->matricule = uniqid();
        $eleve->nationalite = $request->input('nation');
        $eleve->sexe =$sex;
        $eleve->naissance = $request->input('naissance');
        $eleve->ville = $request->input('ville');
        $eleve->telephone = $request->input('telephone');
        $eleve->phone_besoin = $request->input('numero');
        $eleve->nom_pere = $request->input('pere');
        $eleve->nom_mere = $request->input('mere');
        $eleve->classe_id = $request->input('classe');
        $eleve->adresse = $request->input('adresse');
        $result =$eleve->saveOrFail();
        if($result == true){
            $id_eleve = DB::select('select id from eleves where matricule=?', [ $eleve->matricule]);
            $id_annee = DB::select('select id from annee_scolaires where liste_annee=?', [ $request->input('annee')]);
            //dd($id_annee[0]->id);
            //DB::insert('insert into eleve_annees (eleve_id, annee_id) values(?, ?)', [$id_eleve[0]->id, $id_annee[0]->id]);
            $El_An = new EleveAnnee();
            $El_An->eleve_id = $id_eleve[0]->id;
            $El_An->annee_id = $id_annee[0]->id;
            $El_An->save();

         }


        Session::flash('successMsg','le mot de passe de '.$eleve->prenom.' '.$eleve->nom.' est '.$password.'. Et a pour matricule : '.$eleve->matricule);
        return redirect()->route('addstudent');

    }
    public function showprofile(){
        if(Session("info")->role == true){
            $role = 'Super Administrateur';
        }else{
            $role = 'Professeur Principal';
        }
        return view('super_admin_links.profile', ['role'=>$role]);
    }
    public function editprofile(Request $request){
        /*$request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:30',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:20',
            'pass1' => 'string|min:6',
            'pass2' => 'string|min:6',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/
        $store = 'assets/img_profile/'.$request->file('profile')->store('profile');
        Storage::disk('public')->put('filename', $store);
        /*if($request->input('pass1') != $request->input('pass2')){
            Session::flash('successMsg','les mots de passe ne correspondent pas ');
            return redirect()->route('showprofile');
        }*/
       /*$upUser = User::find(Session("info")->user_id);
       dd($upUser);
       $upUser->nom = $request->input('nom');
       $upUser->prenom = $request->input('prenom');
       $upUser->email = $request->input('email');
       $upUser->numero = $request->input('telephone');
       $upUser->image = $store;
       $upUser->save();*/
       DB::table('users')
            ->where('id_user', Session("info")->id_user)
            ->update(['nom' => $request->input('nom'), 'prenom' =>$request->input('prenom'), 'email' =>$request->input('email'), 'numero' =>$request->input('telephone'), 'image' =>$store]);

        //User::update(['user_id' =>Session("info")->user_id],['nom' => $request->input('nom'), 'prenom' =>$request->input('prenom'), 'email' =>$request->input('email'), 'numero' =>$request->input('telephone'), 'image' =>$store]);

        return redirect()->route('showprofile');
    }
}

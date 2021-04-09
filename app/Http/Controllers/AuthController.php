<?php

namespace App\Http\Controllers;
use App\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login.user_log');
    }
    public function adminlog(){
        return view('login.admin_log');
    }
    public function authEleve(Request $request){
        $request->validate([
            'matricule' => 'required|string',
            'password' => 'required|string|min:3',
        ]);
       $controll = DB::select('select id from eleves where matricule=?', [ $request->input('matricule')]);

        $user = Eleve::find($controll[0]->id);
        if (Hash::check($request->input('password'), $user->password)) {
            // Success
            $info = Eleve::all();
            session_start();
            return view('eleves_links.dash', ['info'=>$info]);
        }else{
            return view('login.user_log')->with('successMsg','Vos informations sont incorrect .');
        }


    }
    public function authAdmin(){

    }
}

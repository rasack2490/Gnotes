<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Eleve;
use App\User;
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
            'matricule' => 'required|string|regex:/(^([a-zA-z]+)(\d+)?$)/',
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
    public function authAdmin(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
        ]);
        $controll = DB::select('select id_user, role from users where email=?', [ $request->input('email')]);
        $user = User::find($controll[0]->id_user);

        //print_r($user);
        if (Hash::check($request->input('password'), $user->password)) {
            // Success
            $info = User::all();
            if($info[0]->role == true){

                Session(['info'=>$info]);
                
                //dd(Session::get('info', $info));
                return view('super_admin_links.dasboard', ['info'=>$info]);
            }elseif($info[0]->role == false){
                session_start();

                return view('admin_links.dashboard', ['info'=>$info]);
            }elseif($info[0]->role != true && $info[0]->role != false){
                return view('login.admin_log')->with('successMsg','Vos informations sont incorrect .');
            }

        }else{
            return view('login.admin_log')->with('successMsg','Vos informations sont incorrect .');
        }

    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function logoutsuper(){
        auth()->logout();
        return redirect()->route('logadmin');
    }
}

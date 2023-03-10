<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\defend_attestation;
use Illuminate\Http\Request;
use App\Models\memoires;
use App\Models\themes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //GET REQUESTS ON AUTHCONTROLLER
    public function visiteur_signup_page(){
        return view('pages.Signup.visiteur-signup');
    }
    public function admin_signup_page(){
        return view('pages.Signup.admin-signup');
    }
    public function etudiant_no_code(){
        return view('pages.Signup.etudiant-no-code');
    }

    public function visitor_login_page(){
        return view('pages.Login.visitor');
    }
    public function admin_login_page(){
        return view('pages.Login.admin');
    }

    public function etudiant_code_login_page(){
        return view('pages.Login.studentCode');
    }

    public function etudiant_no_code_login_page(){
        return view('pages.Login.visitor'); //Same with visitor. only difference is that he would have a submitted docs section
    }

    //POST REQUEST ON AUTHCONTROLLER
    public function visiteur_login(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return view("pages.Visiteur.home");
        }
    }
    public function visiteur_signup(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);

        $visitor = new User();
        $visitor->email = $request->email;
        $visitor->name = $request->name;
        $visitor->password = Hash::make($request->password);
        $visitor->role = "visiteur";

        if($visitor->save()){
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)){
                return view("pages.Visiteur.home");
            }
        }
        return "An error occured! Please try again";
    }
    public function admin_login(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials) && (Auth()->user()->role == 'admin')){
            return to_route('admin.gerer_memoires');
        }
        else if(Auth::attempt($credentials)){
            Auth::logout();
            return "You are not an admin!!";
        }
        Auth::logout();
        return "yooo";
    }

    public function admin_signup(Request $request){
        return $request->email;
    }
    public function etudiant_no_code_login(Request $request){
        $user = new User(); //The User which would be created here is the chef
        $chef = new Author(); //The chef information is also added to the Author table
        $auth1 = new Author(); //partner1 information
        $auth2 = new Author(); //partner2 information

        $theme = new themes();
        $memoire = new memoires();
        $attestation = new defend_attestation();


        $user->email = $request->chef_email;
        $user->name = $request->chef_name;
        $user->role = "etudiant_no_code";
        $ThePassword = Hash::make($request->password);
        $user->password = $ThePassword;
        $user->save();


       $chef->email = $request->chef_email;
       $chef->telephone = $request->chef_tel;
       $chef->name = $request->chef_name;
       $chef->is_chef = true;
       $chef->save();

               //THE INFORMATION ON THE THEME!
               $theme->theme = $request->theme;
               $theme->description = $request->description;
               $theme->chef_email = $request->chef_email;
               $theme->chef_id = $chef->id;
               $theme->save();

               //THE INFORMATION ON THE MEMOIRE DOC(MEMOIRE STORED LOCALLY AND NAME STORED IN DB!!)!!!
                $pPath = public_path("uploads");
               $memoire_doc_name = $request->file('defense-thesis')->getClientOriginalName();
            //    File::makeDirectory("{$pPath}/{$memoire_doc_name}");
            $request->file('defense-thesis')->move(public_path("uploads/themes/{$theme->theme}/memoire"), $memoire_doc_name);

            $memoire->doc_path = $memoire_doc_name;
            $memoire->theme_id = $theme->id;
            $memoire->theme_name = $theme->theme;
            $memoire->contents = $memoire_doc_name;
            $memoire->save();

            //  INFORMATION ABOUT THE ATTESTATION(MEMOIRE STORED LOCALLY AND NAME STORED IN DB)
            $attestation_doc_name = $request->file('defense-attestation')->getClientOriginalName();
            $request->file('defense-attestation')->move(public_path("uploads/themes/{$theme->theme}/attestation"), $attestation_doc_name);

            $attestation->theme_id = $theme->id;
            $attestation->doc_path = $attestation_doc_name;
            $attestation->contents = $attestation_doc_name;
            $attestation->save();

       $auth1->email = $request->auth_1_email;
       $auth1->telephone = $request->auth_1_tel;
       $auth1->name = $request->auth_1_name;
       $auth1->save();

       $auth2->email = $request->auth_2_email;
       $auth2->telephone = $request->auth_2_tel;
       $auth2->name = $request->auth_2_name;
       $auth2->save();

    //    Auth::attempt($user->email,$user->password);
    Auth::login($user);
    return view("pages.User.home");
    }
    public function etudiant_code_login(Request $request){
        return $request->email;
    }
    public function logOut(){
        Auth::logout();
        Session::regenerate();
        return to_route('homePage');
    }
}
 ?>

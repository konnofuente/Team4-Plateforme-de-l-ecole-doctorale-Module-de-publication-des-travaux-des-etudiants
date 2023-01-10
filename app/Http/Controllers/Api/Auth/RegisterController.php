<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            
            'prenom'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'profile'=>'required',

        ]);

        // $fileName = "$request->email.jpg";
        // $path = $request->file('profile')->move(public_path("/User_profile_img"), $fileName);
        // $photoURL = url('/'.$fileName); 
        // $request->profile = $photoURL;
        // $path = $request->profile;

        // $user = User::create([ 
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'profile' => $request->profile,
        // ]);
        $user = new User();
        $user->name = 'responsable';
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $request->profile;
        if($user->save()){
            $user->attachRole($request->role_id);
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token'=>$token];
            //return response()->json(['status'=>true, 'message'=>'user as create.','data'=>$response], 200);
            //return new userResource($user);
            event(new Registered($user));
            return response([
                'id' => $user->id,
                'name' => $user->name,
                'prenom' => $user->prenom,
                'email' => $user->email,
                'profile' => $user->profile,
                'haveRole' => $user ->haveRole,
                'created_at' => $user->created_at,
                'update_at' => $user->update_at,
                'token' => $response,
                //'token_expires_at' => $token->token->expires_at,
            ], 200);
        }
        // $user->attachRole($request->role_id);
        // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        // $response = ['token'=>$token];

       // return response(['message' => 'User successfuly register'],200);
        return response($response,200);
    }

    public function upload_profile(Request $request){

        if($request->hasFile('profile')){
            //$fileName = "memoire.pdf";
            $completfilname = $request->file('profile')->getClientOriginalName();
            $fileNameOnly = pathinfo($completfilname, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileName = str_replace(' ', '_', $fileNameOnly).'_'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('profile')->move(public_path("/User_profile_img"), $fileName);
            $fileURL = url('/User_profile_img/'.$fileName);
            $request->profile = $fileURL;
            $path = $request->profile;

            return response()->json(['message'=>'Profile image Upload Succefuly',$path], 200);
        }

        // if($request->hasFile('couverture')){
        //    $completfilname = $request->file('couverture')->getClientOriginalName();
        //    $fileNameOnly = pathinfo($completfilname, PATHINFO_FILENAME);
        //    $extension = $request->file('couverture')->getClientOriginalExtension();
        //    $compPic = str_replace(' ', '_', $fileNameOnly).'_'.rand() . '_'.time(). '.'.$extension;
        //    $path = $request->file('couverture')->storeAs('public/Memoire_file', $compPic);
        //    dd($path);
        // }
        
          //return response()->json(['message'=>'Memoire Upload Succefuly',$path], 200);
    }

    // public function sendSimpleMail(Request $request){
        
    //     $email = $request->email;
    //     $data = array('name' => $email);
      

    //     Mail::send('mail', $data, function($message) use ($data){
    //         //$mail->$email;
    //         // $message -> to('awa@gmail.com', 'BAMAS')->subject('votre compte a ete creer sur Bamas');
    //         // $message->from('Bamas@gmail.com', 'Bamas');
    //         echo $data->$email;
    //     });
    //     //return $email;
    // }

    public function sendSimpleMail(Request $request){

        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',

        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()->all()],409);
        }
   
    $usersemail = $request->email;
    $password = $request->password;
    $bamas = 'bamas@gmail.com';

    $this->validate($request, [
        'email' => 'required|email',
        ]);

    $data = array(
        'email' => $bamas,
        'usersemail' => $usersemail,
        'password' =>  $password 
        );

    Mail::send('mail', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to( $data['usersemail'] );
        $message->subject('votre compte a ete creer sur Bamas');
        
    });

        return response()->json(['message'=>'Message send to',$usersemail], 200);
    }
}

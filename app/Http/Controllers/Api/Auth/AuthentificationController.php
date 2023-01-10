<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{

    public function getuser($email){
        $user = DB::table('users')
        ->select('*')
        ->where('email', $email)
        ->get();
        return response()->json(['message'=>'departement Created Succefuly',$user], 200); 
    }
    public function index()
    {
        $User = User::all();
        return response()->json(
            $User
        );
    }

    public function checkRole($id){
    //     $respo_id = 1;
    //     $user = DB::table('role_user')
    //     ->select('*')
    //     ->where('role_id', $respo_id)
    //     ->where('user_id',$id)
    //     ->get();
    //    return response()->json($user, 200);App\Models\User
         //$user = User::whereRoleIs('responsable')->get();
         $user = User::findorFail($id)->roles->toArray();
         return $user;
        //  if($user=User::findorFail($id)->roles->toArray()){
        //     return response()->json(['message'=>'Succes!',$user], 200);
        //  }else{
        //     return response()->json(['message'=>'User does not have role'], 404);
        //  }
        // return response()->json($user, 200); 
        //return $user;
    }


    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $login = $request -> only('email', 'password');

        if(!Auth::attempt($login)){
            return response(['message' => 'Invalide login credential!'], 401); 
        }
        /**
         * @var User $user
         */
        $user = Auth::user();
        $token = $user->createToken($user->name);

        return response([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'profile' => $user->profile,
            'haveRole' => $user ->haveRole,
            'created_at' => $user->created_at,
            'update_at' => $user->update_at,
            'token' => $token->accessToken,
            'token_expires_at' => $token->token->expires_at,
        ], 200);
    }

    public function logout(Request $request){
        // $this->validate($request, [
        //     'allDevice' => 'required|boolean'
        // ]);
        
        // /**
        //  * @var user $user
        //  */

        // $user = Auth::user();

        // if($request->allDevice){
        //     $user->tokens->each(function($token){
        //         $token->delete();
        //     });
        //     return response(['message'=>'logged out from all devices !!'], 200);
        // }else{
        //     $userToken = $user->token();
        //     $userToken->delete();
        //     return response(['message'=>'logged out Successful !!'], 200);
        // }
        $user = Auth::user()->token();
        $user->revoke();
        return response(['message'=>'logged out Successful !!'], 200);
        // $request->user()->token->revoke();
        // return response()->json([
        //     'message' => 'Successfully logged out'
        // ]);
            
        // $request->user()->currentAccessToken()->delete();
        // return response()->json([
        //         'message' => 'Successfully logged out'
        //     ], 200);

        
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }


    // public function verify(EmailVerificationRequest $request)
    // {
    //     if ($request->user()->hasVerifiedEmail()) {
    //         return [
    //             'message' => 'Email already verified'
    //         ];
    //     }

    //     if ($request->user()->markEmailAsVerified()) {
    //         event(new Verified($request->user()));
    //     }
        
    //     return [
    //         'message'=>'Email has been verified'
    //     ];
    // }

    public function verify($id) {
        $user = User::findOrFail($id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return [
                        'message'=>'Email has been verified'
                    ];
            // return request()->wantsJson()
            //     ? new JsonResponse('', 204)
            //     : redirect(url(env('SPA_URL')).'/dashboard?verified=1');
        }
        return [
                        'message' => 'Email already verified'
                    ];
        // return request()->wantsJson()
        //     ? new JsonResponse('', 204)
        //     : redirect(url(env('SPA_URL')).'/dashboard?verified=1');
    }
}

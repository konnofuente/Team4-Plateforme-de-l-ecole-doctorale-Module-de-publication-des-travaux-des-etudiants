<?php

namespace App\Http\Controllers\Publication;

use App\Models\Publication\Author;
use App\Models\Publication\defend_attestation;
use App\Models\Publication\memoires;
use App\Models\Publication\themes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Http\Controllers\validateTheme;

function validateTheme($theme_id){
    $memoire = memoires::where('theme_id',$theme_id);
    $attestaion = defend_attestation::where('theme_id',$theme_id);

    if($memoire->isValid == true && $attestaion->isValid == true){
        $theme = themes::find($theme_id)->first();
        $theme->isValid = true;
        $theme->verified_by = Auth::user()->email;
        $theme->save();
    }
}

class ThemeController extends Controller
{
    public function get_all_memoires(){
        $verified_themes = themes::where('isValid',true)->get();
        $unverified_themes = themes::where('isValid',false)->get();

        return view('pages.Admin.home')
            ->with('verified_themes',$verified_themes)
            ->with('unverified_themes',$unverified_themes);
    }

    public function get_theme($themeId){
        $theme = themes::find($themeId);
        $attestationName = defend_attestation::where('theme_id',$themeId)->first();
        $memoireName = memoires::where('theme_id',$themeId)->first();
        $chef = Author::where('id',$theme->chef_id)->first();
        // return "The attestation is $attestationName->doc_path and the memoire is $memoireName->doc_path";
        // return "The chef of the project is : $chef->email";

        return view('pages.Admin.singleTheme')
            ->with('theme',$theme)
            ->with('attestation',$attestationName)
            ->with('memoire',$memoireName)
            ->with('chef',$chef)
        ;
    }

    public function viewDoc($fileName,$other){
            // return Response.make(file_get_contents($fileName),200,[
            //     'content-type'=>'application/pdf',
            // ]);
            // $file = File::get($fileName);
            // $response = Response::make($file,200);
            // $response->header('Content-Type','application/pdf');
            // return $response;

            // return Response::make(file_get_contents($fileName),200,[
            //     'content-type'=>'application/pdf',
            // ]);
            // return response()->download($other);

            // return response()->make(file_get_contents($other),200,[
            //     'content-type'=>'application/pdf',
            // ]);

            return response()->file($other);

    }
    public function accept_attestation($theme_id,$doc_id){
        $theme = themes::find($theme_id);
        $attestaion = defend_attestation::find($doc_id);
        $user = Auth::user()->email;

        $attestaion->isValid = true;
        $attestaion->verified_by = $user;
        $attestaion->save();
        validateTheme($theme_id);
        return redirect()->back();
    }
    public function denie_attestation($theme_id,$doc_id,Request $request){
        $theme = themes::find($theme_id);
        $attestaion = defend_attestation::find($doc_id);
        $user = Auth::user()->email;

        $attestaion->error_in_doc = $request->attestation_error;
        $attestaion->isValid = false;
        $attestaion->verified_by = $user;
        $attestaion->save();

        return redirect()->back();

    }

    public function accept_memoire($theme_id,$doc_id){
        $theme = themes::find($theme_id);
        $memoire = memoires::find($doc_id);
        $user = Auth::user()->email;

        $memoire->isValid = true;
        $memoire->verified_by = $user;
        $memoire->save();
        validateTheme($theme_id);
        return redirect()->back();
    }
    public function denie_memoire($theme_id,$doc_id,Request $request){
        $theme = themes::find($theme_id);
        $memoire = memoires::find($doc_id);
        $user = Auth::user()->email;

        $memoire->error_in_doc = $request->memoire_error;
        $memoire->isValid = false;
        $memoire->verified_by = $user;
        $memoire->save();

        return redirect()->back();
    }



}

?>

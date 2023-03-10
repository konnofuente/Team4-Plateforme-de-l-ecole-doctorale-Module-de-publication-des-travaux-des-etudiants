<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\defend_attestation;
use App\Models\memoires;
use App\Models\themes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;




class ThemeController extends Controller
{
    public function get_all_memoires(){
        // $memoires = themes::all();
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

}

?>

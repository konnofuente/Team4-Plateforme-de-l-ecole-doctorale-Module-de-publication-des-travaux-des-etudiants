<?php

namespace App\Http\Controllers;

use App\Models\defend_attestation;
use App\Models\memoires;
use App\Models\themes;
use Illuminate\Http\Request;


class MemoiresController extends Controller
{

    public function index()
    {
        $themes = themes::all();
        return view('pages.Document.AllDocs')->with('themes',$themes);
    }

    public function show($id)
    {
        $theme = themes::find($id);
        $memoire_path = memoires::where('theme_id',$id);
        return "The id is $theme->theme";
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }





    public function edit(memoires $memoires)
    {

    }


    public function update(Request $request, memoires $memoires)
    {

    }


    public function destroy(memoires $memoires)
    {

    }
}

?>

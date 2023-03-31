<?php

namespace App\Http\Controllers\EcoleDoctorat;

use App\Models\Admin\Niveau;
use Illuminate\Http\Request;
use App\Models\Admin\Filiere;
use App\Models\EcoleDoctorat\Jury;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\EcoleDoctorat\Dossier;
use App\Models\EcoleDoctorat\Changement;
use App\Models\Visiteur\Projets;

class DossierController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        $unchecked_projects= Projets::where('is_valid',0)->get();
        $checked_valid= Projets::where('is_valid',1)->get();
        $checked_unvalid= Projets::where('is_valid',2)->get();

        return view('ecoleDoctorat.dossier.index',[
            'projets_count'=>Projets::all()->count(),
            'unchecked_projects'=>$unchecked_projects,
            'checked_valid'=>$checked_valid,
            'checked_unvalid'=>$checked_unvalid
        ]);
        //The view fot this is found in dossier/index.blade.php
    }
    //Str::random(number); To generate random unique code
    public function show($id)
    {
        $selectedProject = Projets::where('id',$id)->first();

        return view('ecoleDoctorat.dossier.single',[
            'selectedProject'=>$selectedProject
        ]);
    }
    public function links($filiere_id, $niveau_id, $status){

    }
    public function shwDoss(Request $request){
        // if()
    }

    public function create()
    {
        //
    }
    public function jury_P(Request $request){

    }
    public function update(Request $request)
    {

    }
    // Formulaire pour editer le theme
    public function edit($id)
    {

    }
    public function update_theme(Request $request){

    }

    public function destroy($id, $valeur)
    {

    }
}

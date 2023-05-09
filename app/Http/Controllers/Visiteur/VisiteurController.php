<?php

namespace App\Http\Controllers\Visiteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visiteur\Projets;



class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projets::where('is_valid',1)->get();
        return view('visiteur.viewAllDocs')->with('projects',$projets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visiteur.submitDoc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //the part that get the chef matricule and generated a code base on the matricule


        $projet = new Projets();
        $projet->theme = $request->projet_theme;
        $projet->abstract = $request->projet_abstract;
        $projet->members = $request->members;
        $projet->chef_telephone = $request->chefTel;
        $projet->domaine = $request->domaine;
        $projet->chef_matricule = $request->chefMat;
        $projet->chef_email = $request->chefMail;
        $projet->encadreur_email = $request->emailEncadreur;
        $projet->encadreur_matricule = $request->matriculeEncadreur;
        $projet->encadreur_telephone = $request->telEncadreur;


         // Send the email with the code
        // Mail::to($projet->chef_email)->send(new CodeGenerated($verification_code));


        $memoire_doc_name = $request->file('memoire_doc')->getClientOriginalName();
        $projet->memoire_path = $memoire_doc_name;
        $request->file('memoire_doc')->move(public_path("uploads/themes/{$projet->theme}/memoire"), $memoire_doc_name);


        $attestation_doc_name = $request->file('attestation_doc')->getClientOriginalName();
        $projet->attestation_path = $attestation_doc_name;
        $request->file('attestation_doc')->move(public_path("uploads/themes/{$projet->theme}/attestation"), $attestation_doc_name);

        if($projet->save()){
            return redirect()->route('visiteur.all');

        }
        else redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($filePath)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

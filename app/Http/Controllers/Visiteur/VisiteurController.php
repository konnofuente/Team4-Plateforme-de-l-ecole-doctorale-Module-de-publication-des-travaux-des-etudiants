<?php

namespace App\Http\Controllers\Visiteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visiteur\Projets;
use Illuminate\Support\Facades\Config;

class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $config = Config::get("global.langs");
    //    $config = config('global.constants.domaines');

    //     return $config;
        $projets = Projets::where('is_valid',1)->get();
        return view('visiteur.viewAllDocs')->with('projects',$projets);
    }
    public function getCate($domaine)
    {
        if(in_array($domaine,config('global.constants.domaines'))){
            $projets = Projets::where('is_valid',1)
                          ->where('domaine',$domaine)->get();
        return view('visiteur.viewAllByCategory')->with('projects',$projets);
        }
        return "The category does not exists";

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
    public function search()
    {
        return view('visiteur.search');
    }
    public function searchResults(Request $request)
    {
        $searchTerm = $request->searchTerm;

    $results = Projets::where(function ($query) use ($searchTerm) {
        $query->where('theme', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('abstract', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('members', 'LIKE', '%' . $searchTerm . '%')
                ->where('is_valid',1)
              ;
        })->get();
        return view('visiteur.search')
            ->with('results',$results)
            ->with('oldTerm',$searchTerm);
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
            $request->flash("succes","Document enregistre avec success");
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

    public function createSecond(){
        return view('visiteur.submitSecondDoc');
    }

    public function storeSecond(Request $request){
        $selectedProj = Projets::where('verification_code',$request->codeFinale)->first();
        if($selectedProj){
            if($selectedProj->is_valid == 1){
                $request->session()->flash("erreur","Ce Projet a deja ete marque comme valide");
                return redirect()->route('visiteur.creerFinale');
            }
            else if($selectedProj->is_valid == 3){
                $request->session()->flash("erreur","Ce code a deja ete utilise");
                return redirect()->route('visiteur.creerFinale');
            }
            else if($selectedProj->is_valid == 2){
                if($request->hasFile('memoire_doc')){

                    $memoire_doc_name = $request->file('memoire_doc')->getClientOriginalName();
                    $selectedProj->memoire_path = $memoire_doc_name;
                    $request->file('memoire_doc')->move(public_path("uploads/themes/{$selectedProj->theme}/memoire/resoumission"), $memoire_doc_name);


                    $attestation_doc_name = $request->file('attestation_doc')->getClientOriginalName();
                    $selectedProj->attestation_path = $attestation_doc_name;
                    $request->file('attestation_doc')->move(public_path("uploads/themes/{$selectedProj->theme}/attestation/resoumission"), $attestation_doc_name);

                    $selectedProj->is_valid = 3;

                    if($selectedProj->save()){
                        $request->session()->flash("success","Vos documents ont ete resoumis avec succes!. vous receverez un mail quand l'administrateur verifie");
                        return redirect()->route('visiteur.creerFinale');

                    }
                    else redirect()->back();
                } else if($request->chefMat){
                    $request->session()->flash("success","Code Valide, Vous pouver maintenant resoumetre vos document");
                    return view('visiteur.submitSecondDoc')->with("codeCorrect",true)->with('verifiCode',$selectedProj->verification_code);
                }
            }

        }

        else{
            $request->session()->flash("erreur","Ce code est invalide");
            return redirect()->route('visiteur.creerFinale');
        }
    }
}

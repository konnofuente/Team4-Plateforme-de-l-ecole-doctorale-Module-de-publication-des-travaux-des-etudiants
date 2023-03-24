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

class DossierController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
        // dd(Auth::user());
        // if(! Gate::allows('super_admin', Auth::user()) || ! Gate::allows('doyen_Ecole', Auth::user())){
        //     abort(403);
        // }
    }
    public function index(Request $request)
    {
        // dd( Gate::allows('doyen_Ecole', Auth::user()));
        if(! Gate::allows('super_admin', Auth::user()) && ! Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }
        $dossiers=Dossier::where('status', '>', 0)->OrderByDesc('updated_at')->paginate(50);
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->where('id', '>', 4)->orderBy('intitule')->get();
        $dossier_nombre=Dossier::where('status', 0)->get()->count();
        $dossier_nombre_1=Dossier::where('status', '>', 0)->get()->count();
        if($request->session()->has('email_success')){

            return view('ecoleDoctorat.dossier.index',[
                'dossier'=>1,
                'email_valide'=>$request->session()->get('email_success'),
                'dossiers'=>$dossiers,
                'filieres'=>$filieres,
                'niveaux'=>$niveaux,
                'n'=>1,
                'dossier_nombre'=>$dossier_nombre,
               'dossier_nombre_1'=>$dossier_nombre_1
            ]);
        }
        if($request->session()->has('email_null_pr') || $request->session()->has('email_null_en') || $request->session()->has('email_null_ex')){
            if($request->session()->has('email_null_pr')){
                $email_pr=$request->session()->get('email_null_pr');
            }else{
                $email_pr=null;
            }
            if($request->session()->has('email_null_en')){
                $email_en=$request->session()->get('email_null_en');
            }else{
                $email_en=null;
            }
            if($request->session()->has('email_null_ex')){
                $email_ex=$request->session()->get('email_null_ex');
            }else{
                $email_ex=null;
            }
            return view('ecoleDoctorat.dossier.index',[
                'dossier'=>1,
                'echec_email_pr'=>$email_pr,
                'echec_email_en'=>$email_en,
                'echec_email_ex'=>$email_ex,
                'dossiers'=>$dossiers,
                'filieres'=>$filieres,
                'niveaux'=>$niveaux,
                'n'=>1,
                'dossier_nombre'=>$dossier_nombre,
               'dossier_nombre_1'=>$dossier_nombre_1
            ]);
        }
        return view('ecoleDoctorat.dossier.index',[
            'dossier'=>1,
            'dossiers'=>$dossiers,
            'filieres'=>$filieres,
            'niveaux'=>$niveaux,
            'n'=>1,
            'dossier_nombre'=>$dossier_nombre,
           'dossier_nombre_1'=>$dossier_nombre_1
        ]);
    }
    public function show(Request $request)
    {
        if(! Gate::allows('super_admin', Auth::user()) && !  Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }

        if($request->filiere_id !=null && $request->niveau_id !=null){
            Filiere::findOrFail($request->filiere_id);
            Niveau::findOrFail($request->niveau_id);
            if($request->status !=null){

                return redirect()->route('Ecole_Doctorat.dossier.links', [$request->filiere_id, $request->niveau_id, $request->status]);
            }else{
                return redirect()->route('Ecole_Doctorat.dossier.links', [$request->filiere_id, $request->niveau_id, 0]);
            }

        }elseif($request->filiere_id !=null && $request->niveau_id ==null){
            Filiere::findOrFail($request->filiere_id);
            if($request->status !=null){
                return redirect()->route('Ecole_Doctorat.dossier.links', [$request->filiere_id, 0, $request->status]);
            }else{
                return redirect()->route('Ecole_Doctorat.dossier.links', [$request->filiere_id, 0, 0]);
            }

        }elseif($request->filiere_id ==null && $request->niveau_id !=null){
            Niveau::findOrFail($request->niveau_id);
            if($request->status !=null){
                return redirect()->route('Ecole_Doctorat.dossier.links', [0, $request->niveau_id, $request->status]);
            }else{
                return redirect()->route('Ecole_Doctorat.dossier.links', [0, $request->niveau_id, 0]);
            }

        }elseif($request->filiere_id ==null && $request->niveau_id ==null){
            if($request->status !=null){
                return redirect()->route('Ecole_Doctorat.dossier.links', [0, 0, $request->status]);
            }else{
                return redirect()->route('Ecole_Doctorat.dossier.index');
            }
        }
        else{
            return redirect()->route('Ecole_Doctorat.dossier.index');
        }
    }
    public function links($filiere_id, $niveau_id, $status){
        if(! Gate::allows('super_admin', Auth::user()) && !  Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }
        // dd('ok');
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->where('id', '>', 4)->orderBy('intitule')->get();
        if($status !=0){
            if($filiere_id !=0 && $niveau_id !=0){
                if($status==1){
                    $dossiers=Dossier::where('status', 1)
                            ->where('filiere_id', $filiere_id)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>1,
                        'filiere_id'=>$filiere_id,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==2){
                    $dossiers=Dossier::where('status', 2)
                            ->where('filiere_id', $filiere_id)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>2,
                        'filiere_id'=>$filiere_id,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==3){
                    $dossiers=Dossier::whereIn('status', [3, 4, 5, 6, 7])
                            ->where('filiere_id', $filiere_id)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>3,
                        'filiere_id'=>$filiere_id,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==4){
                    $dossiers=Dossier::where('status', 8)
                            ->where('filiere_id', $filiere_id)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>4,
                        'filiere_id'=>$filiere_id,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                else{
                    abort(403);
                }
            }elseif($filiere_id !=0 && $niveau_id ==0){
                if($status==1){
                    $dossiers=Dossier::where('status', 1)
                            ->where('filiere_id', $filiere_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>1,
                        'filiere_id'=>$filiere_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==2){
                    $dossiers=Dossier::where('status', 2)
                            ->where('filiere_id', $filiere_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>2,
                        'filiere_id'=>$filiere_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==3){
                    $dossiers=Dossier::whereIn('status', [3, 4, 5, 6, 7])
                            ->where('filiere_id', $filiere_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>3,
                        'filiere_id'=>$filiere_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==4){
                    $dossiers=Dossier::where('status', 8)
                            ->where('filiere_id', $filiere_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>4,
                        'filiere_id'=>$filiere_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                else{
                    abort(403);
                }

            }elseif($filiere_id ==0 && $niveau_id !=0){
                if($status==1){
                    $dossiers=Dossier::where('status', 1)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>1,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==2){
                    $dossiers=Dossier::where('status',  2)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>2,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                elseif($status==3){
                    $dossiers=Dossier::whereIn('status', [3, 4, 5, 6, 7])
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>3,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                elseif($status==4){
                    $dossiers=Dossier::where('status', 8)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>4,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                else{
                    abort(403);
                }

            }elseif($filiere_id ==0 && $niveau_id ==0){
                if($status==1){
                    $dossiers=Dossier::where('status',  1)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'status'=>1,
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==2){
                    $dossiers=Dossier::where('status', 2)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'status'=>2,
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==3){
                    $dossiers=Dossier::whereIn('status', [3, 4, 5, 6, 7])
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'status'=>3,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }elseif($status==4){
                    $dossiers=Dossier::where('status', 8)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                    return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'status'=>4,
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
                }
                else{
                    abort(403);
                }

            }
            else{
                abort(403);
            }
        }else{
            if($filiere_id !=0 && $niveau_id !=0){
                $dossiers=Dossier::where('status', '>', 0)
                            ->where('filiere_id', $filiere_id)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'filiere_id'=>$filiere_id,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
            }elseif($filiere_id !=0 && $niveau_id ==0){
                $dossiers=Dossier::where('status', '>', 0)
                            ->where('filiere_id', $filiere_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'filiere_id'=>$filiere_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
            }elseif($filiere_id ==0 && $niveau_id !=0){
                $dossiers=Dossier::where('status', '>', 0)
                            ->where('niveau_id', $niveau_id)
                            ->OrderByDesc('updated_at')
                            ->paginate(50);
                return view('ecoleDoctorat.dossier.index',[
                        'dossier'=>1,
                        'dossiers'=>$dossiers,
                        'filieres'=>$filieres,
                        'niveau_id'=>$niveau_id,
                        'niveaux'=>$niveaux,
                        'n'=>1,
                    ]);
            }else{
                abort(403);
            }
        }
    }
    public function shwDoss(Request $request){
        // if()
    }

    public function create()
    {
        //
    }
    public function jury_P(Request $request){
        if(! Gate::allows('super_admin', Auth::user()) && !  Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }
      $juries=Jury::select('id', 'noms')->orderby('noms')->get();
      $dossier=Dossier::find($request->id);
        $datas=array();
      if($request->valeur=='president_jury'){
        $valeur=$dossier->president_jury_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->encadreur_id && $jury->id != $dossier->coEncadreur_id && $jury->id != $dossier->cooEncadreur_id && $jury->id != $dossier->examinateur_jury_id && $jury->id != $dossier->coexaminateur_jury_id){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }elseif($request->valeur=='examinateur'){
        $valeur=$dossier->examinateur_jury_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->encadreur_id && $jury->id != $dossier->coEncadreur_id && $jury->id != $dossier->cooEncadreur_id && $jury->id != $dossier->president_jury_id && $jury->id != $dossier->coexaminateur_jury_id){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }elseif($request->valeur=='coexaminateur'){
        $valeur=$dossier->coexaminateur_jury_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->encadreur_id && $jury->id != $dossier->coEncadreur_id && $jury->id != $dossier->cooEncadreur_id && $jury->id != $dossier->examinateur_jury_id && $jury->id != $dossier->president_jury_id ){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }elseif($request->valeur=='encadreur'){
        $valeur=$dossier->encadreur_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->president_jury_id && $jury->id != $dossier->coEncadreur_id && $jury->id != $dossier->cooEncadreur_id && $jury->id != $dossier->examinateur_jury_id && $jury->id != $dossier->coexaminateur_jury_id){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }elseif($request->valeur=='coencadreur'){
        $valeur=$dossier->coEncadreur_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->encadreur_id && $jury->id != $dossier->president_jury_id  && $jury->id != $dossier->cooEncadreur_id && $jury->id != $dossier->examinateur_jury_id && $jury->id != $dossier->coexaminateur_jury_id){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }elseif($request->valeur=='cooencadreur'){
        $valeur=$dossier->cooEncadreur_id;
        foreach($juries as $jury){
            if($jury->id != $dossier->encadreur_id && $jury->id != $dossier->coEncadreur_id && $jury->id != $dossier->president_jury_id  && $jury->id != $dossier->examinateur_jury_id && $jury->id != $dossier->coexaminateur_jury_id){
                $data[]= [
                    'id'=>$jury->id,
                    'noms'=>$jury->noms,
                ];

            }
          }
      }else{
        return 'Erreur !!!';
      }
      return response()->json([
        'data'=>$data,
        'valeur'=>$valeur
      ]);
    }
    public function update(Request $request)
    {
        if(! Gate::allows('super_admin', Auth::user()) && !  Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }

        if($request->valeur=='president_jury'){
            Dossier::where('id', $request->id)
                    ->update([
                        'president_jury_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->president_jury;
        }elseif($request->valeur=='examinateur'){
            Dossier::where('id', $request->id)
                    ->update([
                        'examinateur_jury_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->examinateur_jury;
        }elseif($request->valeur=='coexaminateur'){
            Dossier::where('id', $request->id)
                    ->update([
                        'coexaminateur_jury_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->coexaminateur_jury;
        }elseif($request->valeur=='encadreur'){
            Dossier::where('id', $request->id)
                    ->update([
                        'encadreur_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->encadreur;
        }elseif($request->valeur=='coencadreur'){
            Dossier::where('id', $request->id)
                    ->update([
                        'coEncadreur_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->coEncadreur;
        }elseif($request->valeur=='cooencadreur'){
            Dossier::where('id', $request->id)
                    ->update([
                        'cooEncadreur_id'=>$request->jury_id
                    ]);
            $data=Dossier::findOrFail($request->id);
            $data->cooEncadreur;
        }
        // return response()->json([
        //     'data'=>$data,
        //     'valeur'=>$request->valeur
        //   ]);
            return back();
    }
    // Formulaire pour editer le theme
    public function edit($id)
    {
        $theme=Dossier::select('id', 'theme_recherche')->where('id', $id)->get();
        return response()->json($theme);
    }
    public function update_theme(Request $request){
        Dossier::where('id', $request->id)
                ->update([
                    'theme_recherche'=>$request->theme_recherche,
                ]);
        return back();
    }

    public function destroy($id, $valeur)
    {
        if(! Gate::allows('super_admin', Auth::user()) && !  Gate::allows('doyen_Ecole', Auth::user())){
            abort(403);
        }
        // dd($valeur);
        if($valeur=='president_jury'){
            Dossier::where('id', $id)
                    ->update([
                        'president_jury_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->president_jury;
        }elseif($valeur=='examinateur'){
            Dossier::where('id', $id)
                    ->update([
                        'examinateur_jury_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->examinateur_jury;
        }elseif($valeur=='coexaminateur'){
            Dossier::where('id', $id)
                    ->update([
                        'coexaminateur_jury_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->coexaminateur_jury;
        }elseif($valeur=='encadreur'){
            Dossier::where('id', $id)
                    ->update([
                        'encadreur_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->encadreur;
        }elseif($valeur=='coencadreur'){
            Dossier::where('id', $id)
                    ->update([
                        'coEncadreur_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->coEncadreur;
        }elseif($valeur=='cooencadreur'){
            Dossier::where('id', $id)
                    ->update([
                        'cooEncadreur_id'=>null
                    ]);
            $data=Dossier::findOrFail($id);
            $data->cooEncadreur;
        }
        return back();
    }
}

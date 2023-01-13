<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    //

    public function index(){
        $Authors = Author::all();
        return response()->json([
            'message' => 'Liste des Authors',
            'data'=> $Authors
        ],200);
    }

    public function show($id){
        $Author = Author::find($id);
        if (is_null($Author)) {
            return response()->json([
                'message' => 'Author not found'
            ],404);
        }
        return response()->json([
            'message' => 'Author Trouvee',
            'data' => $Author
        ]);
    }


    public function store(Request $req){
        $validated = Validator::make($req->all(),[
            'name'=> 'required|unique:Authors',
            'matricule'=> 'required',
            'email'=> 'sometimes',
            'file_id'=> 'required',
        ]);
        if($validated->fails()){
            return response()->json($validated->errors(), 400);
        }


        $Author = Author::create($req->all());

        return response()->json([
            'message' => 'Author Ajoutee avec Success',
            'data' => $Author

        ],201);
    }

    
    public function update(Request $req, $id) {
        $Author = Author::find($id);
        if (is_null($Author)) {
            return response()->json([
                'message' => 'Author not found'
            ],404);
        }
        $validated = Validator::make($req->all(),[
            'name'=> 'required|unique:Authors',
            'matricule'=> 'required',
            'email'=> 'sometimes',

        ]);
        if($validated->fails()){
            return response()->json($validated->errors(), 400);
        }
        $Author -> update($req->all());
        return response()->json([
            'message' => 'Author d\'identifiant '. $id . ' modifiee',
            'data' => $Author]);
    }

    public function destroy($id){
        $Author = Author::find($id);
        if (is_null($Author)) {
            return response()->json([
                'message'=>'Author introuvable'
            ],404);
        }
        $copieAuthor = $Author;
        $Author->delete();
        return response()->json([
            'message'=>'Author d\'indentifiant '.$id.' supprimee',
            'data'=>$copieAuthor
        ]);
    }

    public function search($id){
        $Author = Author::find($id);
        if (is_null($Author)) {
            return response()->json([
                'message' => 'Author not found'
            ],404);
        }
        
        return response()->json([
                'data'=>$Author]
        );
    }



}

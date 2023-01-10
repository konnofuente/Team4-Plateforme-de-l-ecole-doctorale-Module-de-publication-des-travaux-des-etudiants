<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaine = Domaine::all();
        if(is_null($domaine)){
            return response()->json(['message'=>'domaine not found'], 404);
        }else{
            return response()->json($domaine, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:domaines|max:255',
            'description' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);
        if($validator->fails()){
            return response()->json(['erreur :'=>$validator->errors()->all()],409);
        }

        $domaine = new Domaine();
        $domaine->name = $request->name;
        $domaine->description = $request->description;
        $domaine->user_id = $request->user_id;
        if($domaine->save()){
            return response()->json(['message'=>'domaine Created Succefuly',$domaine], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domaine = Domaine::find($id);
        if(is_null($domaine)){
            return response()->json(['message'=>'Domaine not found'], 404);
        }else{
            return response()->json($domaine, 200);
        }
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
        $domaine = Domaine::find($id);
        if(is_null($domaine)){
            return response()->json(['message'=>'domaine not found'], 404);
        }else{

            $validator = Validator::make($request->all(),[
                'name' => 'required|unique:domaines|max:255',
                'description' => 'required|max:255',
                'user_id' => 'required|max:255',
            ]);
            if($validator->fails()){
                return response()->json(['erreur :'=>$validator->errors()->all()],409);
            }

            $domaine->name = $request->name;
            $domaine->description = $request->description;
            $domaine->user_id = $request->user_id;
            if($domaine->save()){
            // return new SchoolResource($schools);
                return response()->json(['message'=>'domaine update suceful',$domaine], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domaine = Domaine::find($id);
        if(is_null($domaine)){
            return response()->json(['message'=>'domaine not found'], 404);
        }else{
            if($domaine->delete()){
                // return new SchoolResource($schools);
                return response()->json(['message'=>'domaine delete suceful',$domaine], 200);
             }
        }
    }
}

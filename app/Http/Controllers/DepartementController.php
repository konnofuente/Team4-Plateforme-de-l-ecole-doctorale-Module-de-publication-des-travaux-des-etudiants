<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DepartementResource;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //$departements = Departement::all();
        $departements = Departement::with('domaine','memoire')->get();
        if(is_null($departements)){
            return response()->json(['message'=>'Departement not found'], 404);
        }else{
            return response()->json($departements, 200);
        }
    }


    public function showCase($id)
    { 
        $departements = DB::table('departements')
             ->select('*')
             ->where('user_id', $id)
             ->get();
            return new DepartementResource($departements);
        // $schools = DB::table('schools')->where('user_id', $id)->first();
        // return response()->json($schools, 200);
        // $user = User::findOrFail($id);
        //  $schools = School::all();
        
        //     if(is_null($schools)){
        //         return response()->json(['message'=>'Schools not found'], 404);
        //     }else{
        //         return response()->json(['message'=>'Succes!',$schools], 200);
        //     }
       
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
            'name' => 'required|unique:departements|max:255',
            'description' => 'required|max:255',
            'school_id' => 'required|max:255',
            'domaine_id' => 'required|max:255',
            'user_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['erreur ce departement existe deja'=>$validator->errors()->all()],409);
        }

        $departement = new Departement();
        $departement->name = $request->name;
        $departement->description = $request->description;
        $departement->school_id = $request->school_id;
        $departement->domaine_id = $request->domaine_id;
        $departement->user_id = $request->user_id;
        if($departement->save()){
            return response()->json(['message'=>'departement Created Succefuly',$departement], 200);
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
        $departement = Departement::find($id);
        if(is_null($departement)){
            return response()->json(['message'=>'departement not found'], 404);
        }else{
            return response()->json($departement, 200);
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
        $departement = Departement::find($id);
        if(is_null($departement)){
            return response()->json(['message'=>'departement not found'], 404);
        }else{
            $departement->name = $request->name;
            $departement->description = $request->description;
            //$schools->user_id = $request->user_id;
            if($departement->save()){
            // return new SchoolResource($schools);
                return response()->json(['message'=>'departement update suceful',$departement], 200);
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
        $departement = Departement::find($id);
        if(is_null($departement)){
            return response()->json(['message'=>'departement not found'], 404);
        }else{
            if($departement->delete()){
                // return new SchoolResource($schools);
                return response()->json(['message'=>'departement delete suceful',$departement], 200);
             }
        }
    }
}

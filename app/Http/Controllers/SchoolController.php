<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SchoolResource;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
         $schools = School::all();
        
            if(is_null($schools)){
                return response()->json(['message'=>'Schools not found'], 404);
            }else{
                return response()->json(['message'=>'Succes!',$schools], 200);
            }
       
    }

    public function showCase($id)
    { 
        $schools = DB::table('schools')
             ->select('*')
             ->where('user_id', $id)
             ->get();
            return new SchoolResource($schools);
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
            'name' => 'required|unique:schools|max:255',
            'description' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()->all()],409);
        }

        $schools = new School();
        $schools->name = $request->name;
        $schools->description = $request->description;
        $schools->user_id = $request->user_id;
        if($schools->save()){
            return response()->json($schools, 200);
            //return response()->json(['message'=>'Etablissement creer avec succes'],$schools, 200);
           // return new SchoolResource($schools);
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
        $schools = School::find($id);
        if(is_null($schools)){
            return response()->json(['message'=>'School not found'], 404);
        }else{
            return response()->json($schools, 200);
        }
        //return new SchoolResource($schools);
        //return response()->json($schools, 200);
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
        $schools = School::find($id);
        if(is_null($schools)){
            return response()->json(['message'=>'School not found'], 404);
        }else{
            $validator = Validator::make($request->all(),[
                'name' => 'required|unique:schools|max:255',
                'description' => 'required|max:255',
                
            ]);
            if($validator->fails()){
                return response()->json(['erreur :'=>$validator->errors()->all()],409);
            }
            $schools->name = $request->name;
            $schools->description = $request->description;
            if($schools->save()){
                // return new SchoolResource($schools);
                 return response()->json(['message'=>'School update succeful', $schools], 200);
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
        $schools = School::find($id);
        if(is_null($schools)){
            return response()->json(['message'=>'School not found'], 404);
        }else{
            if($schools->delete()){
                // return new SchoolResource($schools);
                return response()->json(['message'=>'School delete suceful',$schools], 200);
             }
        }
    }
}

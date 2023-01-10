<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Author;
use App\Models\Memoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $authors = Author::with('memoires')->get();
        return response()->json(['status'=>true, 'data'=>$authors], 200);
        // $author = Author::all();
        // if(is_null($author)){
        //     return response()->json(['message'=>'author not found'], 404);
        // }else{
        //     return response()->json($author, 200);
        // }
    }

    public function showCase($id)
    { 
        $authors = Author::with('memoires')
             ->select('*')
             ->where('user_id', $id)
             ->get();
             return response()->json($authors, 200);
            //return new SchoolResource($schools);
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
            'name' => 'required|unique:authors|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()->all()],409);
        }

        $author = new Author();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->user_id = $request->user_id;
        if($author->save()){
            return response()->json(['message'=>'Author Created Succefuly',$author], 200);
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
        $author = Author::findOrFail($id);
        var_dump($author->memoires);
        return response()->json(['status'=>true, 'data'=>$author], 200);
    }

    public function addRole($id){
        $user = User::findOrFail($id);
        $user->attachRole('responsable');
        return response()->json(['status'=>true, 'data'=>$user], 200);
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

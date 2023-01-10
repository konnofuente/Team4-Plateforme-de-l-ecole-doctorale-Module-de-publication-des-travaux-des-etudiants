<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Memoire;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\AuthorMemoire;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\MemoireResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class MemoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$memoire = Memoire::all();
        //var_dump($memoire->authors);
      
        $memoires = Memoire::with('authors','departement.domaine')->get();
        return response()->json(['status'=>true, 'data'=>$memoires], 200);
        // if(is_null($memoire)){
        //     return response()->json(['message'=>'Memoire not found'], 404);
        // }else{
        //     return response()->json($memoire, 200);
        // }
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
            'titre' => 'required|unique:memoires|max:255',
            'description' => 'required',
            'date_soutenance' => 'required',
            'couverture' => 'required|max:255',
            'resume' => 'required',
            'encadreur' => 'required|max:255',
            'key_word' => 'required|max:255',
            'departement_id' =>'required|max:255',
            'user_id' =>'required|max:255',
        ]);

        //echo($path);

        if($validator->fails()){
            return response()->json([$validator->errors()->all()],409);
        }

        // $fileName = "$request->titre.pdf";
        // $path = $request->file('couverture')->move(public_path("/Memoire_file"), $fileName);
        // $fileURL = url('/'.$fileName);
        // $request->couverture = $fileURL;
        // $path = $request->couverture;
     

        $memoire = new Memoire();
        $memoire->titre = $request->titre;
        $memoire->description = $request->description;
        $memoire->date_soutenance = $request->date_soutenance;
        $memoire->couverture = $request->couverture;
        $memoire->resume = $request->resume;
        $memoire->encadreur = $request->encadreur;
        $memoire->key_word = $request->key_word;
        $memoire->departement_id = $request->departement_id;
        $memoire->user_id = $request->user_id;
        if($memoire->save()){
            return response()->json(['message'=>'Memoire Created Succefuly',$memoire], 200);
        }
    }


    public function upload_file(Request $request){

        if($request->hasFile('couverture')){
            //$fileName = "memoire.pdf";
            $completfilname = $request->file('couverture')->getClientOriginalName();
            $fileNameOnly = pathinfo($completfilname, PATHINFO_FILENAME);
            $extension = $request->file('couverture')->getClientOriginalExtension();
            $fileName = str_replace(' ', '_', $fileNameOnly).'_'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('couverture')->move(public_path("/Memoire_file"), $fileName);
            $fileURL = $fileName;
            //$fileURL = url('/Memoire_file/'.$fileName);
            $request->couverture = $fileURL;
            $path = $request->couverture;

            return response()->json(['message'=>'Memoire Upload Succefuly',$path], 200);
        }

      

        // if($request->hasFile('couverture')){
        //    $completfilname = $request->file('couverture')->getClientOriginalName();
        //    $fileNameOnly = pathinfo($completfilname, PATHINFO_FILENAME);
        //    $extension = $request->file('couverture')->getClientOriginalExtension();
        //    $compPic = str_replace(' ', '_', $fileNameOnly).'_'.rand() . '_'.time(). '.'.$extension;
        //    $path = $request->file('couverture')->storeAs('public/Memoire_file', $compPic);
        //    dd($path);
        // }
        
          //return response()->json(['message'=>'Memoire Upload Succefuly',$path], 200);
    }

    public function dowload_file(Request $request){

        $file = $request->path;
        $response = public_path('Memoire_file/'.$file) ;

        // $header = array(
        //     'Content-Type: application/pdf',
        // );
        return response()->download($response);
    }

    public function open_file(Request $request){
        $file = $request->path;
        $response = public_path('Memoire_file/'.$file) ;
        $pdf =  response()->download($response);
        $encode = base64_encode($pdf);

        // $header = array(
        //     'Content-Type: application/pdf',
        // );
        return response()->json(['message'=>'Memoire open Succefuly',$encode], 200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $memoires = Memoire::with([
        //     'departement' => function($builder){
        //         $builder->where('id', 1);
        //     }
        // ])->get();


        
        $memoires = Memoire::where('id', $id)->with('authors','departement.domaine')->get();
       // $memoires = Memoire::find($id)::with(['authors','departement'])->get();
       // var_dump($memoires->authors);
        // foreach ($memoires->authors as $memoire) {
        //     //return $memoire->pivot->memoire_id;
        //     return response()->json(['status'=>true, 'data'=>$memoire], 200);
        // }
        //return response()->json(['status'=>true, 'data'=>$memoires], 200);
        if(is_null($memoires)){
            return response()->json(['message'=>'memoires not found'], 404);
        }else{
            return response()->json($memoires, 200);
        }
        //return new MemoireResource($post);
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

     /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function AddAuthMemoire(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'memoire_id' =>'required|max:255',
            'author_id' =>'required|max:255',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()->all()],409);
        }
        //return $path;

        $author = new AuthorMemoire();
        $author->memoire_id = $request->memoire_id;
        $author->author_id = $request->author_id;
        if($author->save()){
            return response()->json(['message'=>'Author Created Succefuly',$author], 200);
        }
    }


    public function showCase($id)
    { 
        $memoires = DB::table('memoires')
             ->select('*')
             ->where('user_id', $id)
             ->get();
            return new MemoireResource($memoires);
    }

    public function searchKey(Request $request){

       // $memoire = Memoire::first();
        if($request->type == "keyword"){
            $term = $request->input('term');
            //dd($term);
            $result = Memoire::query()
            ->with('authors','departement')
            ->when($term, fn ($query) => $query->where('titre', 'like', "%{$term}%"))->get();
    
            return response()->json(['message'=>'data',$result], 200);
        }else{
            return 'data';
        }
       
    }

    public function searchDepart(Request $request){

        $term = $request->input('term');
        
        $results = Search::add(Memoire::class, 'titre')
        ->add(Departement::where('name', 'like', "%{$term}%"))
       // ->add($term, fn ($query) => $query->where('titre', 'like', "%{$term}%"))
        ->beginWithWildcard()
    ->get($term);
    return response()->json(['message'=>'data',$results], 200);
    }

    public function getdata_byDate(Request $request){
       // $dateFrom = $request->dateFrom;

        $data = Memoire::whereBetween('created_at',[$request->dateFrom.' 00:00:00', $request->dateTo. ' 23:59:59'])->with('authors','departement.domaine')->get();
        
        return response()->json(['message'=>'data',$data], 200);
    }
}

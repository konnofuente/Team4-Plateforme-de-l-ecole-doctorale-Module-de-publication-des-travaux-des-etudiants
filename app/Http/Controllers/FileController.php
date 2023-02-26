<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\File;
use Smalot\PdfParser\Parser;
use Symfony\Component\Console\Input\Input;


class FileController extends Controller
{
    public function index()
    {
        return view('pages.Home');
    }
    public function store(Request $request )
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'auth1'=> 'required|unique:Authors',
            'cord1'=> 'required',
            'mat1'=> 'required',
        ]);

        $file = $request->file('file');
        $auth1= $request->auth1;
        $auth2= $request->auth2;
        $auth3= $request->auth3;
        $cord1=$request->cord1;
        $cord2=$request->cord2;
        $mat1=$request->mat1;
        $mat2=$request->mat2;
        $mat3=$request->mat3;
        // use of pdf parser to read content from pdf

        $fileName = $file->getClientOriginalName();
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());
        $content = $pdf->getText();
        $upload_file = new File;
        $upload_file->orig_filename = $fileName;
        $upload_file->mime_type = $file->getMimeType();
        $upload_file->filesize = $file->getSize();
        $upload_file->content = $content;
        $upload_file->save();
        $file->move(public_path('pdf'), $fileName);

        $lastindex = File::all()->count();

        $author = new Author();
        $author->auth1= $auth1;
        $author->auth2= $auth2;
        $author->auth3= $auth3;
        $author->cord1= $cord1;
        $author->cord2= $cord2;
        $author->mat1= $mat1;
        $author->mat2= $mat2;
        $author->mat3= $mat3;
        $author->file_id = $lastindex;

        if( $author->save()){
            return to_route('documents')->with('success','Your group and attestation has been succesfully registered');
        }
        else {
            return redirect()->back()->with('error','An error occured, please try again later ');
        }



        return redirect('search')->with('success', 'File uploaded successfullly...');



    }
    public function getAll(){
        $files = File::all();
        return view('pages.Documents')->with('docs',$files);
        // return ($files[0]->content);
    }
    public function getAllWithString(){
        $files = File::all();
        return view('pages.search')->with('docs',$files);
    }
    public function getOne($docId){
        // return ('The ID is'.$docId);

        $file = File::find($docId);
        return view('pages.singleDoc')->with('doc',$file);
    }
    public function search(Request $request)
    {
        $search = $request['keyWord'] ?? "";
        $docs = File::where('content', 'LIKE', "%$search%")->get();
        return view('pages.search')->with('docs',$docs);
    }
}

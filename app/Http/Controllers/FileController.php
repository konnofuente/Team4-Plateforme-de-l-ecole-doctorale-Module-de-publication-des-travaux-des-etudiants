<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\File;
use Smalot\PdfParser\Parser;

class FileController extends Controller
{
    public function index()
    {
        return view('file');
    }
    public function store(Request $request)
    {

        $file = $request->file;
        $auth1= $request->auth1;
        $auth2= $request->auth2;
        $auth3= $request->auth3;
        $cord1=$request->cord1;
        $cord2=$request->cord2;
        $mat1=$request->mat1;
        $mat2=$request->mat3;
        $mat3=$request->mat3;
        

        $request->validate([
            'file' => 'required|mimes:pdf',
            'auth1'=> 'required|unique:Authors',
            'cord1'=> 'required',
            'mat1'=> 'sometimes',
        ]);

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
        $author->save();


        // return response()->json([
        //     'message' => 'Author Ajoutee avec Success',
        //     'data' => $author

        // ],201);

        // return redirect()->route('search')->with('success','product update succesfuly');
        
        return redirect('search')->with('success', 'File uploaded successfullly...');
        // return redirect('search');
    }

    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $file = File::where('content', 'LIKE', "%$search%")->get();
        }
        $text = strtolower($file);
        $find = strtolower($request->search);
        $pos = strpos($text, $find);
        if ($pos == true) {

            $message = "String was found";
            return view('data', compact('file'));
        } else {

            echo "String not found.";
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents =  Document::orderBy('created_at','desc')->get();
        
        return view('welcome')->with('documents',$documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_document');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$str = $request->description.' '.$request->title;
        //$tags = explode(' ',$str);
        
        $document = new Document;

        $document->title = $request->title;
        $document->description = $request->description;
        
        $document->path = $request->file('document')->store('uploads');

        $document->save();

        $documents = Document::all();

        return view('welcome')->with('documents',$documents);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        return Storage::Download($document->path);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        $file_url = Storage::Download($document->path);
        return view('update_document')->with(['document'=>$document,'path'=>$file_url]);
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
        $document = Document::find($id);

       $document->title = $request->title;
        $document->description = $request->description;
        
        $document->path = $request->file('document')->store('uploads');

        $document->update();

        //$document->tag($tags);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = Document::find($id);
        $doc->delete();
        $documents = Document::all();

        return view('welcome')->with('documents',$documents);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $documents = Document::where('title','like','%'.$keyword.'%')
        ->orWhere('description','like','%'.$keyword.'%');  
        
        return view('welcome')->with('documents',$documents);
    }
}

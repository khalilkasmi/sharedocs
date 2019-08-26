@extends('layouts.main')

@section('content')

    <h5>EDIT DOCUMENT</h5>
    <form action="/document/{{$document->id}}/update" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="document's title" name="title" value="{{$document->title}}">
        <input type="decription" placeholder="document's description" name="description" value="{{$document->description}}">
        <span>uploaded file</span>
        <a href="/document/{{$document->id}}/download">view</a>
        <input type="file"  name="document" value="{{$path}}">
        <button type="submit">update</button>
    </form>
@endsection

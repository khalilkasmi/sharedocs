@extends('welcome')

@section('content')

    <h5>ADD DOCUMENT</h5>
    <form action="/document/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="document's title" name="title">
        <input type="decription" placeholder="document's description" name="description">
        <input type="file"  name="document">
        <input type="text"  name="tags">
        <button type="submit">add</button>
    </form>
@endsection

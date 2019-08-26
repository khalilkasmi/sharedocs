@extends('layouts.main')

@section('content')

    <form action="/document/search" method="get">
        <input type="text" name="keyword">
        <input type="submit">
    </form>

    @if(count($documents) > 0)
        <ul>
            @foreach($documents as $document)
                <li>
                    <ul>
                        <li><p>{{$document->title}}</p></li>
                        <li><p>{{$document->description}}</p></li>
                        <li><a href="/document/{{$document->id}}/download">Download</a></li>
                        <li><a href="/document/{{$document->id}}/edit">edit</a></li>
                        <li><a href="/document/{{$document->id}}/delete">delete</a></li>
                       
                    </ul>
                </li>
            @endforeach
        </ul> 
    @else
        <h4>nothing to show for now</h4>
    @endif
@endsection

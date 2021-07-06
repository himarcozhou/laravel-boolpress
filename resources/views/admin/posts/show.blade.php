@extends('layout.default')

@section('page_title', 'Comics Details')


@section('content')

<a href="{{ route('comics.index') }}">Torna alla home</a>
<a href="{{ route('comics.edit', ["comic" => $comic->id]) }}">Modifica</a>

@include('partials.components.deleteBtn', ["id" => $comic->id])
<h3>SHOW</h3>
<ul>
    <li>Title: {{$comic->title}}</li>
    <li>Description: {{$comic->description}}</li>
    <li>Thumbnail: {{$comic->thumb}}</li>
    <li>Price: {{$comic->price}}</li>
</ul>

@endsection

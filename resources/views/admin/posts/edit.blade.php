@extends('layout.default')

@section('page_title', 'Modifica un comic esistente')


@section('content')

<a href="{{ route('comics.index') }}">Torna alla home</a>


<h3>EDIT</h3>
<form action="{{route('comics.update', $comic->id)}}" method="post">
@csrf

@method("PATCH")

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{$comic->title}}">
    
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{$comic->description}}">

    <label for="thumb">thumb</label>
    <input type="text" name="thumb" id="thumb" value="{{$comic->thumb}}">
    
    <label for="price">Price</label>
    <input type="text" placeholder="€0.00" name="price" id="price" value="{{$comic->price}}">
    
    <label for="series">Series</label>
    <input type="text" name="series" id="series" value="{{$comic->series}}">
    
    <label for="sale_date">Sale date</label>
    <input type="date" name="sale_date" id="sale_date" value="{{$comic->sale_date}}">
    
    <label for="type">Type</label>
    <input type="text" name="type" id="type" value="{{$comic->type}}">


    <input type="submit" value="Invio">
</form>

@endsection

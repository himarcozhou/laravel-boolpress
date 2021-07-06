@extends('layout.default')

@section('page_title', 'Add new Comic')


@section('content')
<h3>CREATE</h3>
<a href="{{ route('comics.index') }}">Torna alla home</a>

@include('partials.components.errorsAlert')

<form action="{{route('comics.store')}}" method="post">
@csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    
    <label for="description">Description</label>
    <input type="text" name="description" id="description">

    <label for="thumb">thumb</label>
    <input type="text" name="thumb" id="thumb">
    
    <label for="price">Price</label>
    <input type="text" placeholder="€0.00" name="price" id="price" >
    
    <label for="series">Series</label>
    <input type="text" name="series" id="series">
    
    <label for="sale_date">Sale date</label>
    <input type="date" name="sale_date" id="sale_date">
    
    <label for="type">Type</label>
    <input type="text" name="type" id="type">

    <input type="submit" value="Invio">
</form>

@endsection

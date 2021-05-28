@extends('layouts.app')

@section('content')
<h3>il existe {{count($products)}} produits(s) </h3>
<ul>
    @foreach ($products as $product )
<li>
        <p>{{$product->product_name}} est de catégorie  {{$product->category->name}}</p>
    </li>
    @endforeach
</ul>
<form action="{{route('addproduct')}}" method="post">
    @csrf
    <br>
    <label for="">product_name</label>
    <input type="text" name="product_name">
    <br>
    <br>
    <label for="">product_description</label>
    <input type="text" name="product_description">
    <br>
    <br>
    <label for="">name</label>
    <input type="text" name="name">
    <br>
    <br>
    <label for="">description</label>
    <input type="text" name="description">
    <br>
    <br>
    <label for="">unit_price</label>
    <input type="text" name="unit_price">
    <br>
    <br>
    <label for="">msrp</label>
    <input type="text" name="msrp">
    <br>
    <br>
    <label for="color">color</label>
    <input type="text" name="color">
    <br>

    <br>
    <label for="">Size</label>
    <select name="size" id="">

        <option value="XS">XS</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="2XL">2XL</option>
        <option value="3XL">3XL</option>
    </select>
    <br>
    <label for="">Categorie</label>
    <select name="category_id" id="">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

    </select>

    <br>
    <input type="submit" value="Envoyer">
</form>

@endsection

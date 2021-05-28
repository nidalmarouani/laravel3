@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name}} : <p>{{$category->description}}</p>

            <div>Les produits
           {{count($category->products)}}
           <ul>
           @foreach ($category->products as $product)
             <ol>{{$product->name}}</ol>
           @endforeach
        </ul>
            </div>
        </li>
        @endforeach
    </ul>

@endsection

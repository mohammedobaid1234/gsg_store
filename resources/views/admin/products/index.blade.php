@extends('starter')
@section('style')
    <style>
        button{
            width: 120%;
            padding: 0;
            display: inline-block;
            float: left;
        }
       
        .clearFix{
            clear: both;
        }
    </style>
@endsection
@section('title')
Product Page  <a href="{{route('products.create')}}">Create</a>
@endsection
@section('breadclumb')
     <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
     <li class="breadcrumb-item active">Categories Page</li> 
@endsection
@section('content')
    <x-message />
    {{-- <x-alert /> --}}
    <table class="table table-striped" >
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Product Name</th>
        <th>proice</th>
        <th>quantity</th>
        <th>width</th>
        <th>height</th>
        <th>wight</th>
        <th>length</th>
        <th>Created At</th>
        <th>Operation</th>
    </thead>
        @foreach ($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['Product_name']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['quantity']}}</td>
                <td>{{$product['width']}}</td>
                <td>{{$product['height']}}</td>
                <td>{{$product['wight']}}</td>
                <td>{{$product['length']}}</td>
                <td>{{$product['created_at']}}</td>
                <td>
                   <a href={{route('products.edit',$product->id)}}><button type="button" class="btn btn-primary"><i class="far fa-edit" style="margin-right:5px"></i>Edit</button></a>
                </td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <td>
                     <button type="submit" class="btn btn-dark"> <i class="far fa-trash-alt" style="margin-right:5px"></i>Delete</button>
                    </td>
              </form>
            </tr>   
        @endforeach
   
</table>
{{$products->links()}}
@endsection

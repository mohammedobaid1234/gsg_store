@extends('starter')
@section('links')
    <link rel="stylesheet" href={{asset('assets/admin/create/css/style.css')}}>
@endsection

@section('title','Create Page')
@section('breadclumb')
     <li class="breadcrumb-item"><a href="{{route('products.index')}}">Home</a></li>
     <li class="breadcrumb-item active">Create Catedories Page</li> 
@endsection    
@section('content')
    <form action={{ route('products.store') }} method="POST" enctype="multipart/form-data">
      @csrf
      @include('admin/products/_form',[
        'btn' => 'Create'
      ])
        
    </form>
@endsection
@section('footer')
    <script src={{ asset('assets/admin/create/js/main.js') }}></script>
@endsection
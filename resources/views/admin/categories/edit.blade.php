{{-- {{dd($prevCategories->image_path)}} --}}
@extends('starter')
@section('links')
    <link rel="stylesheet" href={{asset('assets/admin/create/css/style.css')}}>
@endsection
@section('title','Create Page')
    
@section('content')
    <form action={{ route('categories.update',[$prevCategories->id])  }} method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
        @include('admin/categories/_form',[
          'btn' => 'Update'
        ])
    </form>
@endsection
@section('footer')
    <script src={{ asset('assets/admin/create/js/main.js') }}></script>
@endsection
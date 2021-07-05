@extends('starter')
@section('links')
    <link rel="stylesheet" href={{asset('assets/admin/create/css/style.css')}}>
@endsection
@section('title','Create Page')
    
@section('content')
    <form action={{ route('categories.store') }} method="POST">
      @csrf
      @include('admin/categories/_form',[
        'btn' => 'Create'
      ])
        
    </form>
@endsection
@section('footer')
    <script src={{ asset('assets/admin/create/js/main.js') }}></script>
@endsection
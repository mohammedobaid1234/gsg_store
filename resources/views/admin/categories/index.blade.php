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
@section('title', 'Category Page')
@section('breadclumb')
     <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
     <li class="breadcrumb-item active">Categories Page</li> 
@endsection
@section('content')
    @if (session()->has('succuss'))
    
    <div class="alert alert-primary">{{session()->get('succuss')}}</div>
    @endif
    @if (session()->has('delete'))
    
    <div class="alert alert-danger">{{session()->get('delete')}}</div>
    @endif

    <table class="table table-striped" style="width: 185%">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        {{-- <th>Description</th> --}}
        <th>Parent_ID</th>
        <th>Status</th>
        <th>Created At</th>
    </thead>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category['id']}}</td>
                <td>{{$category['name']}}</td>
                <td>{{$category['slug']}}</td>
                {{-- <td>{{$category['description']}}</td> --}}
                <td>{{$category['parent_num']}}</td>
                <td>{{$category['status']}}</td>
                <td>{{$category['created_at']}}</td>
                <td>
                   <a href={{route('categories.edit',$category->id)}}><button type="button" class="btn btn-primary"><i class="far fa-edit" style="margin-right:5px"></i>Edit</button></a>
                </td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <td>
                     <button type="submit" class="btn btn-dark"> <i class="far fa-trash-alt" style="margin-right:5px"></i>Delete</button>
                    </td>
              </form>
            </tr>   
        @endforeach
   
</table>
@endsection

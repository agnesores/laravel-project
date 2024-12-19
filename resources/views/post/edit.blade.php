@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }
    body{
        background-color: #f8e6f6;
        font-family: monospace;
    }
    .text-pink{
        color: #78306e;
    }
    .text-dark-pink{
        color: #bf52b1;
    }
    .text-dark-pink:hover{
        color: #8d3882;
    }
    .min-width{
        min-width:40vh;
    }
    .btn-pink{
        background-color: #c05cb2;
        border: none;
        padding: 0.3rem;
        border-radius: 0.6rem;
        color: whitesmoke;
    }
    .btn-pink:hover{
        color: whitesmoke;
        background-color: #ba51ac;
        transform: scale(1.05);
        transition: transform 0.3s;
    }
    .hover-effect {
        transition: transform 0.3s; /* Transform özelliğindeki geçiş süresi */
    }
    .hover-effect:hover {
        transform: scale(1.01);
    }
    .border-pink{
        border: #8d3882 2px solid;
    }
    input[type=file] {
        display: none;    
    }
    .image-input{
        font-family: monospace;
        cursor: pointer; 
    }
    </style>
</head>
<body>
    <center>
        @auth
        @if ($m->user_id === auth()->user()->id)
        <div class="card rounded min-width rounded-5 p-2 border-pink w-25">
            <h1 class="h3 m-3 text-center text-pink">Edit Post</h1>
        <form action="{{action('App\Http\Controllers\BlogController@update', $m->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="image" class="image-input btn-pink w-50">Choose image</label>
                <input id="image" name="image" type="file"> 
            <input type="text" name="posttitle" class="form-control m-1 w-75 hover-effect border-pink text-center rounded rounded-4" value="{{$m->posttitle}}" placeholder="Post Title:">    
            <input type="text" name="category_id" class="form-control m-1 w-75 hover-effect border-pink text-center rounded rounded-4" value="{{$m->category_id}}" placeholder="Category:"> 
            <button type="submit" id="submit" class="btn-pink m-1">Update</button>  
          
        </form>
        <form action="{{ action('App\Http\Controllers\BlogController@destroy', $m->id )}}" method="post">@method('DELETE') @csrf
            <button type="submit" class="btn-pink m-1">Delete</button>
        </form>
        </center>
        @endif
        @endauth
</body>
</html>
@endsection
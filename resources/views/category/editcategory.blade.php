@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    </style>
</head>
<body>
    <center>
        @hasanyrole('admin|employee')
        <div class="card rounded rounded-5 p-2 border-pink w-25 min-width">
    <h1 class="h3 m-3 text-center text-pink">Edit Category</h1>
    <form action="{{action('App\Http\Controllers\CategoryController@update', $cat->id)}}" method="post">
        @method('PUT')        
        @csrf
        <label for="name" class="text-pink m-1">Category Name:</label>
        <input type="text" name="name" value="{{$cat->name}}" class="form-control w-75 hover-effect border-pink text-center rounded rounded-4"><br>
        <button class="btn btn-pink w-25 my-2">save</button>
    </form>
    </div>
    </center>
    @else
    <center>
        <h1 class="text-danger"> You Are Not Allowed To Be Here, Please Go Back To <a href="{{url('/')}}" class="text-danger"> Home</a> </h1> 
    </center>
    @endhasanyrole
</body>
</html>
@endsection
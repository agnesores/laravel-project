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
    @hasanyrole('admin|employee')
    <center>
    <div class="card rounded rounded-5 p-2 border-pink w-25 min-width">
    <h1 class="h3 m-3 text-center text-pink">Add Category</h1>
    <form action="{{action('App\Http\Controllers\CategoryController@store')}}"method="POST">
        @csrf
        <label for="name" class="text-pink m-1">Category Name:</label>
        <input type="text" name="name" class="form-control w-75 hover-effect border-pink text-center rounded rounded-4"><br>
        <button class="btn btn-pink w-25 my-2">save</button>
    </form>
    </div>
    <div class="table-container mt-5">

    <table class="w-50">
        <thead>
          <tr>
            <th class="text-center">Category</th>
            <th class="text-center">#</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="text-center">{{$category->name}}</td>
                <td class="text-center">
                  <form action="{{ action('App\Http\Controllers\CategoryController@destroy', $category->id )}}" method="post">
                      @method('DELETE') @csrf
                  <button type="submit" class="border-0 hover-effect">
                    <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.98996C8.81444 4.87965 15.1856 4.87965 21 6.98996" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.00977 5.71997C8.00977 4.6591 8.43119 3.64175 9.18134 2.8916C9.93148 2.14146 10.9489 1.71997 12.0098 1.71997C13.0706 1.71997 14.0881 2.14146 14.8382 2.8916C15.5883 3.64175 16.0098 4.6591 16.0098 5.71997" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 13V18" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 9.98999L18.33 17.99C18.2225 19.071 17.7225 20.0751 16.9246 20.8123C16.1266 21.5494 15.0861 21.9684 14 21.99H10C8.91389 21.9684 7.87336 21.5494 7.07541 20.8123C6.27745 20.0751 5.77745 19.071 5.67001 17.99L5 9.98999" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </button></form>
              </td>
              <td class="text-center">
                  <a href="category/{{$category->id}}/edit">
                    <svg class="hover-effect" width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
              </td>
            </tr>
            @endforeach
          </tr>
        </tbody>
    </table>
    </div>
    @else
<center>
    <h1 class="text-danger"> You Are Not Allowed To Be Here, Please Go Back To <a href="{{url('/')}}" class="text-danger"> Home</a> </h1> 
</center>
@endhasanyrole
    
</body>
</html>
@endsection
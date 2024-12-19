@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
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
    </style>
</head>
<body>
<br><br><br><br>
@role('admin')
    <center>
    
        <table class="table w-75">
            <thead>
                <th class="text-center">User Name</th>
                <th class="text-center">User E-mail</th>
                <th class="text-center">Roles</th>
                <th class="text-center">#</th>
                <th class="text-center">#</th>
                <th class="text-center">#</th>
                <th class="text-center">#</th>
            </thead>
            <tbody>
                @foreach ($users as $user) 
                <tr>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->roles->implode('name', ', ') }}</td>
                    <td class="text-center">
                        <form action="{{ route('users.assign-admin', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn-pink">Set as Admin</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('users.assign-employee', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn-pink">Set as Employee</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ action('App\Http\Controllers\UserController@destroy', $user->id )}}" method="post">@method('DELETE') @csrf
                            <button type="submit "  class="btn btn-danger float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button></form>
                    </td>
                        <td class="text-center">
                            <form action="{{ route('users.remove-role', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="bg-warning text-light border-0 p-1 rounded rounded-3 hover-effect">Remove Role</button>
                            </form>
                       
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    
    </center>
    @else
<center>
    <h1 class="text-danger"> You Are Not Allowed To Be Here, Please Go Back To <a href="{{url('/')}}" class="text-danger"> Home</a> </h1> 
</center>
@endrole
</body>
</html>
@endsection
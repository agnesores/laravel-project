@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images\lavender.png">

    <title>Lavender</title>
</head>
<body>

    <center>
    <h1 id="recievedreq">Recieved Requests</h1>
    <div>
        @if ($friendRequests->count() > 0) {{-- friendRequests koleksiyonunun eleman sayısına bakarak kontrol ediyoruz --}}
            <table style="width: 50%">
                <thead>
                    <th id="uname">User Name:</th>
                    <th>#</th>
                    <th>#</th>
                </thead>
                <tbody>
                @foreach ($friendRequests as $request)
                    <tr>
                        <td>{{ $request->user ? $request->user->name : 'Unknown User' }}</td>
                        <td>
                            <form action="{{ route('friend.accept', ['request' => $request]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" style="width: 15%;background-color:rgb(21,7,62);"><img src="{{asset('images/tick.png')}}" alt="accept" style="width: 50%">
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('friend.reject', ['request' => $request]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" style="width: 15%;background-color:rgb(21,7,62);"><img src="{{asset('images/cross.png')}}" alt="accept" style="width: 50%">
                                </button>          
                             </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @else
            <p id="noreq">No requests</p>
        @endif
    </div>
</center>
</body>
</html>

@endsection

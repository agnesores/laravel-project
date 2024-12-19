@extends('layouts.app') {{-- Ana layout dosyanıza genişletin --}}
@section('content') {{-- İçerik bölümünü tanımlayın --}}
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
    <body>
        <center>
        <h1 id="acceptedrequests">Friends</h1>

        @if ($acceptedFriendRequests->count() > 0)
        <table class="w-50">
            <thead>
                <th id="uname">User Name:</th>
                <th>#</th>
            </thead>
            <tbody>
                @foreach($acceptedFriendRequests as $acceptedFriendRequest)
                <tr>
                    <td>{{ $acceptedFriendRequest->friend->name }}</td>
                    <td>
                        <form action="{{ route('friend.delete', ['id' => $acceptedFriendRequest->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0">
                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.98996C8.81444 4.87965 15.1856 4.87965 21 6.98996" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.00977 5.71997C8.00977 4.6591 8.43119 3.64175 9.18134 2.8916C9.93148 2.14146 10.9489 1.71997 12.0098 1.71997C13.0706 1.71997 14.0881 2.14146 14.8382 2.8916C15.5883 3.64175 16.0098 4.6591 16.0098 5.71997" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 13V18" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 9.98999L18.33 17.99C18.2225 19.071 17.7225 20.0751 16.9246 20.8123C16.1266 21.5494 15.0861 21.9684 14 21.99H10C8.91389 21.9684 7.87336 21.5494 7.07541 20.8123C6.27745 20.0751 5.77745 19.071 5.67001 17.99L5 9.98999" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                          </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
        @else
            <p id="nofriend">There's no Friends</p>
        @endif
        </center>
    </body>
</html>    
                
@endsection

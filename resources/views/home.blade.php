@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  @auth
    
@role('admin')
  <a href="category/create" class="btn btn-pink ms-3">Categories</a>
@endrole

<div class="container p-5">

  <div class="row">

    <div class="col-md-8">

      <div class="row">

        <div class="card border-pink p-4 rounded rounded-4">
          <form action="{{action('App\Http\Controllers\BlogController@store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="posttitle" data-translate-key="writeSomething">Write Something</label>
              <input type="text" name="posttitle" class="form-control border-pink rounded rounded-4">
            </div>
            <div class="row mb-3">
              
              <div class="col-md-6 text-center my-1">
                <label for="image" class="image-input btn btn-pink w-50">Choose image</label>
                <input id="image" name="image" type="file">
              </div>
  
              <div class="col-md-6 my-1">
                  <select name="category_id" class="form-control w-75 p-1 hover-effect border-pink text-center rounded rounded-4">
                    <option disabled selected>Select Category</option>
    
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="row mb-1 mt-4">
              <div class="col text-center">
                <button class="btn btn-pink w-50">Post</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        @foreach ($ps as $p)
          <div class="card border-pink my-2 p-4 rounded rounded-4" style="background-color: #f8e6f6;">
            <div class="row">
              <div class="col-md-6 mb-2">
                <h5>{{ $p->user->name }}</h5>
              </div>
              <div class="col-md-6">
                @auth
                  @if ($p->user_id === auth()->user()->id)
                  <a href="blog/{{$p->id}}/edit" class="float-end">
                    <svg  class="hover-effect" width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>              
                  </a>                  
                  @endif
                @endauth
                @role('admin')
                <form action="{{ action('App\Http\Controllers\BlogController@destroy', $p->id )}}" method="post">@method('DELETE') @csrf
                  <button type="submit" class="border-0">
                    <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.98996C8.81444 4.87965 15.1856 4.87965 21 6.98996" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.00977 5.71997C8.00977 4.6591 8.43119 3.64175 9.18134 2.8916C9.93148 2.14146 10.9489 1.71997 12.0098 1.71997C13.0706 1.71997 14.0881 2.14146 14.8382 2.8916C15.5883 3.64175 16.0098 4.6591 16.0098 5.71997" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 13V18" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 9.98999L18.33 17.99C18.2225 19.071 17.7225 20.0751 16.9246 20.8123C16.1266 21.5494 15.0861 21.9684 14 21.99H10C8.91389 21.9684 7.87336 21.5494 7.07541 20.8123C6.27745 20.0751 5.77745 19.071 5.67001 17.99L5 9.98999" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </button>
                </form>
                @endrole                
                
              </div>
            </div>
            <div class="row">
              @if ($p->image)
              <center>
                <img src="{{('storage/'.$p->image) }}" class="w-100 rounded rounded-4 mb-2" style="max-height: 22rem">
              </center>
              @endif
            <p class="mt-2">{{$p->posttitle}}</p>
            </div>

            <div class="row">
              <h4 class="h5">Comments:</h4>
              @foreach ($comments as $comment)
                @if ($comment->post_id === $p->id)
                  <div class="row ps-4">
                    {{ $comment->user->name }} :{{ $comment->comment }}
                    @role('admin')
                      <form action="{{ action('App\Http\Controllers\CommentController@destroy', $comment->id )}}" method="post">
                        @method('DELETE') @csrf
                        <button type="submit"  class="border-0">
                          <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.98996C8.81444 4.87965 15.1856 4.87965 21 6.98996" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.00977 5.71997C8.00977 4.6591 8.43119 3.64175 9.18134 2.8916C9.93148 2.14146 10.9489 1.71997 12.0098 1.71997C13.0706 1.71997 14.0881 2.14146 14.8382 2.8916C15.5883 3.64175 16.0098 4.6591 16.0098 5.71997" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 13V18" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 9.98999L18.33 17.99C18.2225 19.071 17.7225 20.0751 16.9246 20.8123C16.1266 21.5494 15.0861 21.9684 14 21.99H10C8.91389 21.9684 7.87336 21.5494 7.07541 20.8123C6.27745 20.0751 5.77745 19.071 5.67001 17.99L5 9.98999" stroke="#78306e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </button>
                      </form>
                    @endrole
                  </div>
                @endif
              @endforeach
            </div>
            
            <form action="{{ action('App\Http\Controllers\CommentController@store') }}" method="POST" class="mt-4">
              @csrf 
              <input type="hidden" name="post_id" id="post_id" value="{{$p->id}}">
              <div class="container">
                <input class="d-inline form-control hover-effect border-pink rounded rounded-4 w-50" type="text" name="comment" placeholder="write comment:">
                <button class="d-inline btn btn-pink">Send</button>
              </div>
            </form>
          </div>  
        @endforeach
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-6 text-center">
          <button class="btn btn-pink"><a class="text-decoration-none text-light" href="{{ route('friend.requests') }}">Friend Requests</a></button>
        </div>
        <div class="col-md-6 text-start">
          <button class="btn btn-pink"><a class="text-decoration-none text-light" href="{{ route('friend.accepted-requests') }}">Friends</a></button>
        </div>
      </div>
        @foreach ($users as $user)
        @if($user->id !== Auth::id())
        <div class="row my-3">
          <div class="col-md-6">
            <h6 class="h6 text-center">{{ $user->name }}</h6>
          </div>
          <div class="col-md-6">
            <form method="POST" action="{{ route('friend.send', ['user' => $user->id]) }}">
              @csrf
              <button type="submit" class="btn btn-pink">Send</button>
            </form>
          </div>
        </div>
        @endif
      @endforeach
      </div>
    </div>
  </div>
</div>
      

@endauth

</body>
</html>
@endsection

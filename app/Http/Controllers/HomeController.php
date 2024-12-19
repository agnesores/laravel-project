<?php

namespace App\Http\Controllers;

use App\Models\AcceptedFriendship;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories =Category::all();
        
        $authUserId = auth()->user()->id;

        $friendIds = AcceptedFriendship::where('user_id', $authUserId)
        ->orWhere('friend_id', $authUserId)
        ->pluck('user_id')
        ->merge(AcceptedFriendship::where('friend_id', $authUserId)->pluck('user_id'))
        ->toArray();

        $users = User::whereNotIn('id', array_merge([$authUserId], $friendIds))
        ->get();

        
        $ps = Post::all()->sortDesc();
        $comments = Comment::all();
        return view('home',compact('users','ps','comments','categories'));
    }
}

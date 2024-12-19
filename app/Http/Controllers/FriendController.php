<?php

namespace App\Http\Controllers;

use App\Models\AcceptedFriendship;
use App\Models\Friend;
use App\Models\User;
use CreateAcceptedFriendshipsTable;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function viewAcceptedFriendRequests()
{
    $userId = auth()->id();
    $acceptedFriendRequests = AcceptedFriendship::where('user_id', $userId)->get();
    return view('friend.accepted-friend-requests', compact('acceptedFriendRequests'));
}
    public function send(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return redirect()->back();
        }
        $friend = new Friend();
        $friend->user_id = auth()->user()->id;
        $friend->friend_id = $user->id;
        $friend->save();
    
        return redirect()->back();
}
public function accept(Friend $request)
{
    $request->accepted = true;
    $request->save();
    $acceptingUserId = auth()->user()->id;
    $acceptedFriendId = $request->user_id;

    // Create an entry for the accepting user
    AcceptedFriendship::create([
        'user_id' => $acceptingUserId,
        'friend_id' => $acceptedFriendId,
    ]);

    // Create an entry for the user who initiated the friend request
    AcceptedFriendship::create([
        'user_id' => $acceptedFriendId,
        'friend_id' => $acceptingUserId,
    ]);

    $request->delete();

    return redirect()->back();
}



public function rejectFriendRequest(Friend $request)
{
    $request->delete();

    return redirect()->back();
}
public function deleteFriend($id)
{
    
    $friendship = AcceptedFriendship::where('user_id',$id);

    if ($friendship) {
        $friendship->delete();
    } 
    $friendship_ = AcceptedFriendship::where('friend_id',$id);
    if ($friendship_) {
        $friendship_->delete();
    }
    return redirect()->back();


}


public function showFriendRequests(User $id)
{   
    $friendRequests = Friend::where('friend_id', auth()->id())->get();

    return view('friend.friend-requests', compact('friendRequests'));
}

}

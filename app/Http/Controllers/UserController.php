<?php

namespace App\Http\Controllers;

use App\Models\AcceptedFriendship;
use Spatie\Permission\Models\Role;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();        
        return view('showu', compact('users'));
    }

    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        // Handle case where user with the given ID is not found
        return redirect('/us')->with('error', 'User not found');
    }

    // Delete related posts
    $user->post()->delete();

    // Delete related friendships
    AcceptedFriendship::where('friend_id', $id)->orWhere('user_id', $id)->delete();

    // Delete the user
    $user->delete();

    return redirect('/us')->with('success', 'User deleted successfully');
}

    public function assignAdmin(User $user)
    {
        $user->assignRole('admin');
        return redirect()->back()->with('success', 'User assigned as Admin');
    }
    
    public function assignEmployee(User $user)
    {
        $user->assignRole('employee');
        return redirect()->back()->with('success', 'User assigned as Employee');
    }
    public function removeRole(User $user)
{
    if ($user->hasRole('admin')) {
        $user->removeRole('admin');
    } else {
        $user->removeRole('employee');

    }
    
    return redirect()->back();
}



}

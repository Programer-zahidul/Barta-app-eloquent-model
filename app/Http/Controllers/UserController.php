<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function people(){
        $users = User::take(10)->get();
        return view('people', compact('users'));
    }

    public function search(Request $request) {
        $search = $request->search;
        $query = User::query();
        $query->whereAny(['fname', 'lname', 'email', 'username'], 'LIKE', '%'.$search . "%");
        $users = $query->take(7)->get();
        return view('people', compact('users'));
    }

    public function person_details(User $person) {
        $post = Post::where('user_id', $person->id)->orderBy('created_at', 'desc')->get();
        return view('profile.profile', ['user' => $person, 'posts' => $post]);
    }
}

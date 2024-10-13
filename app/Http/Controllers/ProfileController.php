<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index():View{
        $user = User::findOrFail(Auth::id());
        $post = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('profile.index', ['user' => $user, 'posts' => $post]);
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => User::findOrFail(Auth::id()),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::id());
        $request->validate([
            'img' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
            'fname' => ['required', 'string', 'max:55'],
            'lname' => ['nullable', 'string', 'max:55'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:55'],
            'password' => ['required', 'min:5', Rules\Password::defaults()],
            'bio' => ['nullable','string']
        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/images/', $filename);
            $img_path = 'storage/images/' . $filename;
        }else{
            $img_path = null;
        }
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img' => $img_path,
            'bio' => $request->bio
        ]);

        return redirect(route('profile.index'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

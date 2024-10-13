<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:55'],
            'username' => ['required', 'string', 'min:4', 'max:25', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:55', 'unique:' . User::class],
            'password' => ['required', 'min:5', 'confirmed', Rules\Password::defaults()],
        ]);

        // destructure name
        $lname = "";
        $name = explode(" ", $request->name);
        if (count($name) > 1) {
            $lname = array_pop($name);
            $fname = implode(" ", $name);
        } else {
            $fname = $request->name;
        }
        // dd($fname); 11111111
        $user = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img' => 'storage/images/avater.jfif',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('posts.index', absolute: false));
    }
}

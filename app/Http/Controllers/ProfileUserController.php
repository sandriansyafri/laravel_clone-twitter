<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class ProfileUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $statuses = $user->statuses()->latest()->get();
        return view('page.user.profile', compact(['user', 'statuses']));
    }

    public function edit(User $user)
    {
        return view('page.user.edit-profile', compact(['user']));
    }

    public function editPassword(User $user)
    {
        return view('page.user.edit-password', compact(['user']));
    }


    public function store(Request $request, User $user)
    {
        if (auth()->user()->hasFollow($user)) {
            auth()->user()->unfollow($user);
        } else {
            auth()->user()->follow($user);
        }
        return back();
    }

    public function update(Request $request, User $user)
    {

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);
        return redirect()->route('profile.edit', $user->username);
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        $current_password = $request->current_password;
        if (!Hash::check($current_password, $user->password)) {
            return back()->with('status-error', 'password is not match');
        }

        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('status-success', 'password is  changed');
    }
}

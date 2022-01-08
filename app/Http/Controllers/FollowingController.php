<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{

    public function __invoke(User $user, $following)
    {
        if ($following !== 'following' && $following !== 'followers') {
            return redirect()->route('profile', [$user->username]);
        };
        $follows = $following === 'following' ? $user->follows : $user->followers;

        return view('page.user.following', compact(['user', 'follows']));
    }
    // public function following(User $user)
    // {
    //     $following = $user->follows;
    //     return view('page.user.following', compact(['user', 'following']));
    // }
    // public function followers(User $user)
    // {
    //     $following = $user->followers;
    //     return view('page.user.following', compact(['user', 'following']));
    // }
}

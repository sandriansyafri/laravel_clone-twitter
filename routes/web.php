<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'timeline');
Route::get('/test', function () {
    $user = User::find(10);
    $user->follow(User::find(1));
    return 'ok';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::get('explore', ExploreUserController::class)->name('explore');
    Route::post('timeline', [StatusController::class, 'store']);
    Route::prefix('profile')->group(function () {
        Route::get('{user:username}', ProfileUserController::class)->name('profile')->withoutMiddleware('auth');
        Route::post('{user:username}', [ProfileUserController::class, 'store'])->name('profile.store');
        Route::put('{user:username}', [ProfileUserController::class, 'update'])->name('profile.update');
        Route::get('{user:username}/edit', [ProfileUserController::class, 'edit'])->name('profile.edit');
        Route::get('{user:username}/edit-password', [ProfileUserController::class, 'editPassword'])->name('profile.editPassword');
        Route::put('{user:username}/edit-password', [ProfileUserController::class, 'updatePassword'])->name('profile-password.update');
        Route::get('{user:username}/{following}', FollowingController::class)->name('profile.following');
    });
    // Route::get('profile/{user:username}', ProfileUserController::class)->name('profile')->withoutMiddleware('auth');
    // Route::post('profile/{user:username}', [ProfileUserController::class, 'store'])->name('profile.store');
    // Route::get('profile/{user:username}/{following}', FollowingController::class)->name('profile.following');
    // Route::get('profile/{user:username}/following', [FollowingController::class, 'following'])->name('following');
    // Route::get('profile/{user:username}/followers', [FollowingController::class, 'followers'])->name('followers');
});


require __DIR__ . '/auth.php';

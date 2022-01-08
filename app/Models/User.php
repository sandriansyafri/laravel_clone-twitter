<?php

namespace App\Models;

use App\Traits\Following;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 60)
    {
        $default = 'mm';
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
        return $grav_url;
    }


    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function storeStatus($body)
    {
        $this->statuses()->create([
            'identifier' => Str::random(32),
            'body' => $body
        ]);
    }

    public function timeline()
    {
        $following = $this->follows()->pluck('id');
        $statuses = Status::where('user_id', $this->id)
            ->orWhereIn('user_id', $following)
            ->latest()
            ->get();

        return $statuses;
    }
}

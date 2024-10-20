<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function responces()
    {
        return $this->hasMany(Responce::class);
    }
    
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows','following', 'followed');
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows','followed', 'following');
    }
    
    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }
    
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }
    
    public function isfollowing($user_id)
    {
        return (boolean) $this->follows()->where('followed', $user_id)->exists();
    }
    
    public function isfollowed($user_id)
    {
        return (boolean) $this->followrs()->where('followed', $user_id)->exists();
    }
}

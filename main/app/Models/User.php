<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    protected $guarded = ['id'];

    public function getAuthIdentifierName(){
        return 'email';
    }
    public function mentor(){
        return $this->hasOne(Mentor::class);
    }
    public function student(){
        return $this->hasOne(Student::class);
    }
    public function admin(){
        return $this->hasOne(Admin::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
    public function repliesreview(){
        return $this->hasMany(Review::class);
    }

}

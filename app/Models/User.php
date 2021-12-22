<?php

namespace App\Models;

use App\Models\Complains;
use Laravel\Sanctum\HasApiTokens;
use Rogercbe\TableSorter\Sortable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'address',
        'gender',
        'phone',
        'birth_date',
        'image',
        'password',
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isOnline(){
        return Cache::has('is_online',$this->id);
    }
    public function complaint()
    {
        //code...
        return $this->hasMany('App\Models\Complains', 'user_id');
    }
    public $sortable = ['user_id', 'department', 'category', ];
}
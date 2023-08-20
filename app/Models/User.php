<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Filters\UsernameFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'is_admin',
        'is_active',
        'password',
        'deleted_at',
    ];
    protected $attributes = [
        'is_admin' => 0,
        'is_active' => 1,
    ];
    public function scopeFilter(Builder $query, $filters)
{
    return (new UsernameFilter())->apply($query, $filters);
}
    
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
    public function adress(){
        return $this->morphOne(Address::class ,'addressable','addressable_type','addressable_id','id') ;
    }
    public function purcheaseorders(){
        return $this->hasMany(purchease_orders::class,'user_id' ,'id');
    }
}

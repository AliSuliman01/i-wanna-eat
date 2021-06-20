<?php

namespace App\Domain\General\Users\Users\Model;

use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'reset_password_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function getRole(){
        return $this->role()->first() ? $this->role()->first()->name : null ;
    }

}

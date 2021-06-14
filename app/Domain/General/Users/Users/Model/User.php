<?php

namespace App\Domain\General\Users\Users\Model;

use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @OA\Schema (
 *     required = {"email","password"},
 *     @OA\Xml(name="User"),
 *     @OA\Property (property="id" ,type="integer", example="1"),
 *     @OA\Property (property="username" ,type="string", example="username"),
 *     @OA\Property (property="email", type="string", format="email", example="user@test.com"),
 *     @OA\Property (property="email_verified_at", type="string" ,format="date-time", example="2020-3-25 20:30:50"),
 *     @OA\Property (property="user_photo", type="string", example="/storage/users/photos/username_1249382727.jpg"),
 *     @OA\Property (property="mobile_number", type="string", example="0987654321"),
 *     @OA\Property (property="password_reset_at", type="string", format="date-time", example="2020-3-25 20:30:50"),
 *     @OA\Property (property="language_id", type="integer" ,example="1"),
 *     @OA\Property (property="role_id", type="integer", example="1"),
 * )
 * Class User
 * */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

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

<?php


namespace App\Domain\General\Users\Users\DTO;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;


class UserDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;
    /* @var string|null */
    public $username;
    /* @var string|null */
    public $email;
    /* @var string|null */
    public $password;
    /* @var integer|null */
    public $language_id;
    /* @var string|null */
    public $user_photo;
    /* @var string|null */
    public $mobile_number;
    /* @var integer|null */
    public $region_id;
    /* @var string|null */
    public $verification_token;
    /* @var string|null */
    public $reset_password_token;
    /* @var string|null */
    public $email_verified_at;
    /* @var string|null */
    public $password_reset_at;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'username' => $request['username'] ?? null,
            'email' => $request['email'] ?? null,
            'password' => $request['password'] ?? null,
            'language_id' => $request['language_id'] ?? null,
            'user_photo' => $request['user_photo'] ?? null,
            'mobile_number' => $request['mobile_number'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'verification_token' => $request['verification_token'] ?? null,
            'reset_password_token' => $request['reset_password_token'] ?? null,
            'email_verified_at' => $request['email_verified_at'] ?? null,
            'password_reset_at' => $request['password_reset_at'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,
        ]);
    }
}

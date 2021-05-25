<?php


namespace App\Domain\General\Users\Users\Actions;


use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Domain\General\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;

class UserDestroyAction
{
    public static function execute(
        UserDTO   $userDTO
    ){

        $user = User::find($userDTO->id);
        $user->delete();
        return $user;
    }
}

<?php


namespace App\Domain\General\Users\Users\Actions;


use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Domain\General\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;

class UserCreateAction
{
    public static function execute(
        UserDTO $userDTO
    ){

        $user = new User($userDTO->toArray());
        $user->save();
        return $user;
    }
}

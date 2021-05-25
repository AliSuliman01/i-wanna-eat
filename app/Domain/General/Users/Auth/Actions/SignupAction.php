<?php


namespace App\Domain\General\Users\Auth\Actions;


use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Domain\General\Users\Users\Model\User;

class SignupAction
{
    public static function execute(UserDTO $userDTO){
        $user = new User($userDTO->toArray());
        $user->save();
        return $user ;
    }
}

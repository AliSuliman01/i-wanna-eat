<?php


namespace App\Domain\General\Users\Users\Actions;


use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Domain\General\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;

class UserUpdateAction
{

    public static function execute(
        UserDTO $userDTO
    ){
        $user = User::find($userDTO->id);
        $user->update(array_filter($userDTO->toArray()));
        $user->save();
        return $user;
    }
}

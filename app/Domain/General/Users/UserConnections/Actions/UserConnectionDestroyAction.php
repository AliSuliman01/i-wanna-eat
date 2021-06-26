<?php


namespace App\Domain\General\Users\UserConnections\Actions;


use App\Domain\General\Users\UserConnections\DTO\UserConnectionDTO;
use App\Domain\General\Users\UserConnections\Model\UserConnection;
use Illuminate\Support\Facades\Auth;

class UserConnectionDestroyAction
{
    public static function execute(
        UserConnectionDTO   $userConnectionDTO
    ){

        $userConnection = UserConnection::find($userConnectionDTO->id);
        $userConnection->delete();
        return $userConnection;
    }
}

<?php


namespace App\Http\ViewModels\General\Users\UserConnections;

use App\Domain\General\Users\UserConnections\Model\UserConnection;
use Illuminate\Contracts\Support\Arrayable;


class UserConnectionShowVM implements Arrayable
{

    private $userConnectionId;

    public function __construct($props)
    {
        $this->userConnectionId = $props['id'] ;
    }

    private function get_UserConnection(){
        return UserConnection::find($this->userConnectionId);
    }
    public function toArray(): array
    {
        return  $this->get_UserConnection()->toArray();
    }
}

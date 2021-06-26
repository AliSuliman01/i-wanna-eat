<?php


namespace App\Http\ViewModels\General\Users\UserConnections;

use App\Domain\General\Users\UserConnections\Model\UserConnection;
use Illuminate\Contracts\Support\Arrayable;

class UserConnectionIndexVM implements Arrayable
{

    public function get_user_connections(){
    	return UserConnection::all();
	}
    public function toArray(): array
    {
        return $this->get_user_connections()->toArray();
    }
}

<?php


namespace App\Http\ViewModels\General\Users\Users;

use App\Domain\General\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class UserIndexVM implements Arrayable
{

    public function get_users(){
    	return User::all();
	}
    public function toArray(): array
    {
        return [
            'users' => $this->get_users()
        ];
    }
}

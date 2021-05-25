<?php


namespace App\Http\ViewModels\General\Roles\Roles;

use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Contracts\Support\Arrayable;

class RoleIndexVM implements Arrayable
{

    public function get_roles(){
    	return Role::all();
	}
    public function toArray(): array
    {
        return [
            'roles' => $this->get_roles()
        ];
    }
}

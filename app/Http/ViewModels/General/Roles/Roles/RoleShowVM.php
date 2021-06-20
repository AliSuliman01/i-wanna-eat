<?php


namespace App\Http\ViewModels\General\Roles\Roles;

use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Contracts\Support\Arrayable;


class RoleShowVM implements Arrayable
{

    private $roleId;

    public function __construct($roleId)
    {
        $this->roleId = $roleId ;
    }

    private function get_Role(){
        return Role::find($this->roleId);
    }
    public function toArray(): array
    {
        return $this->get_Role();
    }
}

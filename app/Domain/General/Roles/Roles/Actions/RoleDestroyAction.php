<?php


namespace App\Domain\General\Roles\Roles\Actions;


use App\Domain\General\Roles\Roles\DTO\RoleDTO;
use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Support\Facades\Auth;

class RoleDestroyAction
{
    public static function execute(
        RoleDTO   $roleDTO
    ){

        $role = Role::find($roleDTO->id);
        $role->delete();
        return $role;
    }
}

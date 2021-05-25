<?php


namespace App\Domain\General\Roles\Roles\Actions;


use App\Domain\General\Roles\Roles\Actions\RoleUpdateAction;
use App\Domain\General\Roles\Roles\DTO\RoleDTO;
use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Support\Facades\Auth;

class RoleCreateAction
{
    public static function execute(
        RoleDTO $roleDTO
    ){

        $role = new Role($roleDTO->toArray());
        $role->save();
        return $role;
    }
}

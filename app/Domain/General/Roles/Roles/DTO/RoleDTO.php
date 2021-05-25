<?php


namespace App\Domain\General\Roles\Roles\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RoleDTO extends DataTransferObject
{
    public $id;
    /* @var string|null */
    public $name;
    /* @var string|null */
    public $description;
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'name' => $request['name'] ?? null,
            'description' => $request['description'] ?? null,
            'created_by_user_id' => $request['created_by_user_id'] ?? null,
            'updated_by_user_id' => $request['updated_by_user_id'] ?? null,
            'deleted_by_user_id' => $request['deleted_by_user_id'] ?? null,

        ]);
    }
}

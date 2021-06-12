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

    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'name' => $request['name'] ?? null,
            'description' => $request['description'] ?? null,

        ]);
    }
}

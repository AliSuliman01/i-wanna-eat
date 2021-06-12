<?php


namespace App\Domain\General\Regions\RegionTypes\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RegionTypeDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
        ]);
    }
}

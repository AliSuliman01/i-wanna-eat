<?php


namespace App\Domain\General\Regions\Regions\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RegionDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $region_type_id;
	/* @var integer|null */
public $parent_region_id;

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'region_type_id' 					=> $request['region_type_id'] ?? null ,
			'parent_region_id' 					=> $request['parent_region_id'] ?? null ,

        ]);
    }
}

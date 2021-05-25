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
	
    /* @var integer|null */
    public $created_by_user_id;
    /* @var integer|null */
    public $updated_by_user_id;
    /* @var integer|null */
    public $deleted_by_user_id;
    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'region_type_id' 					=> $request['region_type_id'] ?? null ,
			'parent_region_id' 					=> $request['parent_region_id'] ?? null ,
			
            'created_by_user_id' 					=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 					=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 					=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}

<?php


namespace App\Domain\General\Regions\RegionTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RegionTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $region_id;
	/* @var integer|null */
public $language_id;
	/* @var string|null */
public $name;
	
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
            'region_id' 					=> $request['region_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			
            'created_by_user_id' 					=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 					=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 					=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}

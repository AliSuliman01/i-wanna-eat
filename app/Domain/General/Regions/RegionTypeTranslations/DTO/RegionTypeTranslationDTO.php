<?php


namespace App\Domain\General\Regions\RegionTypeTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RegionTypeTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $region_type_id;
	/* @var integer|null */
public $language_id;
	/* @var string|null */
public $name;
    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'region_type_id' 					=> $request['region_type_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,

        ]);
    }
}

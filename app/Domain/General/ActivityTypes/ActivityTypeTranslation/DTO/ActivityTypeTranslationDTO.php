<?php


namespace App\Domain\General\ActivityTypes\ActivityTypeTranslation\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ActivityTypeTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $activity_type_id;
	/* @var integer|null */
public $language_id;
	/* @var string|null */
public $name;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'activity_type_id' 					=> $request['activity_type_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			
        ]);
    }
}

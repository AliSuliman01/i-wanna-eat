<?php


namespace App\Domain\Main\Services\ServiceTranslation\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ServiceTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $service_id;
	/* @var integer|null */
public $language_id;
	/* @var string|null */
public $name;
	/* @var string|null */
public $description;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'service_id' 					=> $request['service_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			'description' 					=> $request['description'] ?? null ,
			
        ]);
    }
}

<?php


namespace App\Domain\General\Languages\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class LanguageDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var string|null */
public $name;
	/* @var string|null */
public $abbrev;
	
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
            'name' 					=> $request['name'] ?? null ,
			'abbrev' 					=> $request['abbrev'] ?? null ,
			
            'created_by_user_id' 					=> $request['created_by_user_id'] ?? null ,
			'updated_by_user_id' 					=> $request['updated_by_user_id'] ?? null ,
			'deleted_by_user_id' 					=> $request['deleted_by_user_id'] ?? null ,

        ]);
    }
}

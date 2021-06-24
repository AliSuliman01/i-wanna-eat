<?php


namespace App\Domain\Main\Categories\CategoryTranslations\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $category_id;
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
            'category_id' 					=> $request['category_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			'description' 					=> $request['description'] ?? null ,
			
        ]);
    }
}

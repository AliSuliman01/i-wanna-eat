<?php


namespace App\Domain\Main\Products\ProductTranslation\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $product_id;
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
            'product_id' 					=> $request['product_id'] ?? null ,
			'language_id' 					=> $request['language_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			'description' 					=> $request['description'] ?? null ,
			
        ]);
    }
}

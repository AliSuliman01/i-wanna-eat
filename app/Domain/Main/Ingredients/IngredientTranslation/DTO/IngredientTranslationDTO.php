<?php


namespace App\Domain\Main\Ingredients\IngredientTranslation\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class IngredientTranslationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $language_id;
	/* @var integer|null */
public $ingredient_id;
	/* @var string|null */
public $name;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'language_id' 					=> $request['language_id'] ?? null ,
			'ingredient_id' 					=> $request['ingredient_id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			
        ]);
    }
}

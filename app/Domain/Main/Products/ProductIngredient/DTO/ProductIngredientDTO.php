<?php


namespace App\Domain\Main\Products\ProductIngredient\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductIngredientDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $product_id;
	/* @var integer|null */
public $ingredient_id;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'product_id' 					=> $request['product_id'] ?? null ,
			'ingredient_id' 					=> $request['ingredient_id'] ?? null ,
			
        ]);
    }
}

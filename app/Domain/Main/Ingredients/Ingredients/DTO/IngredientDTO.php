<?php


namespace App\Domain\Main\Ingredients\Ingredients\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class IngredientDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var string|null */
public $photo_path;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'photo_path' 					=> $request['photo_path'] ?? null ,
			
        ]);
    }
}

<?php


namespace App\Domain\Main\Products\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $is_verified_from_us;
	/* @var integer|null */
public $category_id;
	/* @var decimal|null */
public $price;
	/* @var integer|null */
public $restaurant_id;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'is_verified_from_us' 					=> $request['is_verified_from_us'] ?? null ,
			'category_id' 					=> $request['category_id'] ?? null ,
			'price' 					=> $request['price'] ?? null ,
			'restaurant_id' 					=> $request['restaurant_id'] ?? null ,
			
        ]);
    }
}

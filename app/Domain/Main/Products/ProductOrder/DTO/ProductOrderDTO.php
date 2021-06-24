<?php


namespace App\Domain\Main\Products\ProductOrder\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductOrderDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $product_id;
	/* @var integer|null */
public $order_id;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'product_id' 					=> $request['product_id'] ?? null ,
			'order_id' 					=> $request['order_id'] ?? null ,
			
        ]);
    }
}

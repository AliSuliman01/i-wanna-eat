<?php


namespace App\Domain\Main\Orders\Orders\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OrderDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var decimal|null */
public $discount;
	/* @var decimal|null */
public $total_price;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'discount' 					=> $request['discount'] ?? null ,
			'total_price' 					=> $request['total_price'] ?? null ,
			
        ]);
    }
}

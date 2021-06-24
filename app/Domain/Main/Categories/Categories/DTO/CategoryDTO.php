<?php


namespace App\Domain\Main\Categories\Categories\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $is_verified_from_us;
	/* @var integer|null */
public $is_offer;
	/* @var integer|null */
public $discount_percentage;
	/* @var string|null */
public $expired_at;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'is_verified_from_us' 					=> $request['is_verified_from_us'] ?? null ,
			'is_offer' 					=> $request['is_offer'] ?? null ,
			'discount_percentage' 					=> $request['discount_percentage'] ?? null ,
			'expired_at' 					=> $request['expired_at'] ?? null ,
			
        ]);
    }
}

<?php


namespace App\Domain\Main\Services\ServiceOrder\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ServiceOrderDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $service_id;
	/* @var integer|null */
public $order_id;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'service_id' 					=> $request['service_id'] ?? null ,
			'order_id' 					=> $request['order_id'] ?? null ,
			
        ]);
    }
}

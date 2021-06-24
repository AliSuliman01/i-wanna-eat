<?php


namespace App\Domain\Main\Services\Services\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ServiceDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            
        ]);
    }
}

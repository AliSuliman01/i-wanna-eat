<?php


namespace App\Domain\General\ActivityTypes\ActivityTypes\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ActivityTypeDTO extends DataTransferObject
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

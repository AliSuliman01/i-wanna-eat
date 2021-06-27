<?php


namespace App\Domain\General\Files\Files\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class FileDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var string|null */
public $file_name;
	/* @var string|null */
public $file_path;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'file_name' 					=> $request['file_name'] ?? null ,
			'file_path' 					=> $request['file_path'] ?? null ,
			
        ]);
    }
}

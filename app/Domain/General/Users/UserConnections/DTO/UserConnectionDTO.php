<?php


namespace App\Domain\General\Users\UserConnections\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class UserConnectionDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $user_id;
	/* @var string|null */
public $ip;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'user_id' 					=> $request['user_id'] ?? null ,
			'ip' 					=> $request['ip'] ?? null ,
			
        ]);
    }
}

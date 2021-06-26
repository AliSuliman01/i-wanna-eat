<?php


namespace App\Domain\General\Users\UserActivity\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class UserActivityDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $activity_type_id;
	/* @var integer|null */
public $user_id;
	/* @var integer|null */
public $target_id;
	/* @var string|null */
public $target_table_name;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'activity_type_id' 					=> $request['activity_type_id'] ?? null ,
			'user_id' 					=> $request['user_id'] ?? null ,
			'target_id' 					=> $request['target_id'] ?? null ,
			'target_table_name' 					=> $request['target_table_name'] ?? null ,
			
        ]);
    }
}

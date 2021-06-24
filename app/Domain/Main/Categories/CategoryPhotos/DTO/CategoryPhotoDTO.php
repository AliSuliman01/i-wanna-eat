<?php


namespace App\Domain\Main\Categories\CategoryPhotos\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryPhotoDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $category_id;
	/* @var string|null */
public $photo_path;
	

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'category_id' 					=> $request['category_id'] ?? null ,
			'photo_path' 					=> $request['photo_path'] ?? null ,
			
        ]);
    }
}

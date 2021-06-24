<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RestaurantPhotoDTO extends DataTransferObject
{
public $id;
	/* @var integer|null */
public $restaurant_id;
	/* @var string|null */
public $photo_path;


    public static function fromRequest($request)
    {
        return new self([
			'id' 					=> $request['id'] ?? null ,
			'restaurant_id' 					=> $request['restaurant_id'] ?? null ,
			'photo_path' 					=> $request['photo_path'] ?? null ,

        ]);
    }
}

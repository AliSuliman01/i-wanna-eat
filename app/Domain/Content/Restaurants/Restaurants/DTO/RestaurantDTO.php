<?php


namespace App\Domain\Content\Restaurants\Restaurants\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RestaurantDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;
    /* @var integer|null */
    public $region_id;
    /* @var string|null */
    public $name;
    /* @var integer|null */
    public $stars;
    /* @var integer|null */
    public $is_validated_from_us;
    /* @var string|null */
    public $open_at;
    /* @var string|null */
    public $close_at;
    /* @var integer|null */
    public $has_family_section;


    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'name' => $request['name'] ?? null,
            'stars' => $request['stars'] ?? null,
            'is_validated_from_us' => $request['is_validated_from_us'] ?? null,
            'open_at' => $request['open_at'] ?? null,
            'close_at' => $request['close_at'] ?? null,
            'has_family_section' => $request['has_family_section'] ?? null,

        ]);
    }
}

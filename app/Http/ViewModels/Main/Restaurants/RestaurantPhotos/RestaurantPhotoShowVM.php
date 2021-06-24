<?php


namespace App\Http\ViewModels\Main\Restaurants\RestaurantPhotos;

use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Contracts\Support\Arrayable;


class RestaurantPhotoShowVM implements Arrayable
{

    private $restaurantPhotoId;

    public function __construct($props)
    {
        $this->restaurantPhotoId = $props['id'] ;
    }

    private function get_RestaurantPhoto(){
        return RestaurantPhoto::find($this->restaurantPhotoId);
    }
    public function toArray(): array
    {
        return  $this->get_RestaurantPhoto();
    }
}

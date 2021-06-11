<?php


namespace App\Http\ViewModels\Content\Restaurants\Restaurants;

use App\Domain\Content\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;


class RestaurantShowVM implements Arrayable
{

    private $restaurantId;

    public function __construct($props)
    {
        $this->restaurantId = $props['id'] ;
    }

    private function get_Restaurant(){
        return Restaurant::find($this->restaurantId);
    }
    public function toArray(): array
    {
        return [
            'Restaurant' => $this->get_Restaurant()
        ];
    }
}

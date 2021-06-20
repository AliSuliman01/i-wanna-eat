<?php


namespace App\Http\ViewModels\Main\Restaurants\Restaurants;

use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;


class RestaurantShowVM implements Arrayable
{

    private $restaurantId;

    public function __construct($props)
    {
        $this->restaurantId = $props['id'] ;
    }

    private function get_Restaurant(){
        return Restaurant::with(['region'])->find($this->restaurantId);
    }
    public function toArray(): array
    {
        return  $this->get_Restaurant()->toArray();
    }
}

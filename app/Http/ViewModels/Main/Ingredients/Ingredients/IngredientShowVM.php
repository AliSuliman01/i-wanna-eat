<?php


namespace App\Http\ViewModels\Main\Ingredients\Ingredients;

use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Contracts\Support\Arrayable;


class IngredientShowVM implements Arrayable
{

    private $ingredientId;

    public function __construct($props)
    {
        $this->ingredientId = $props['id'] ;
    }

    private function get_Ingredient(){
        return Ingredient::with(['translations'])->find($this->ingredientId);
    }
    public function toArray(): array
    {
        return  $this->get_Ingredient()->toArray();
    }
}

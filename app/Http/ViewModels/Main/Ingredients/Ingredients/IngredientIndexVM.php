<?php


namespace App\Http\ViewModels\Main\Ingredients\Ingredients;

use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Contracts\Support\Arrayable;

class IngredientIndexVM implements Arrayable
{

    public function get_ingredients(){
    	return Ingredient::with(['translations'])->get();
	}
    public function toArray(): array
    {
        return $this->get_ingredients()->toArray();
    }
}

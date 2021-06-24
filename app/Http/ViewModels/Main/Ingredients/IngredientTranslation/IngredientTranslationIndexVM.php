<?php


namespace App\Http\ViewModels\Main\Ingredients\IngredientTranslation;

use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Contracts\Support\Arrayable;

class IngredientTranslationIndexVM implements Arrayable
{

    public function get_ingredient_translation(){
    	return IngredientTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_ingredient_translation();
    }
}

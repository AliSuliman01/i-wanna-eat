<?php


namespace App\Http\ViewModels\Main\Ingredients\IngredientTranslation;

use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Contracts\Support\Arrayable;


class IngredientTranslationShowVM implements Arrayable
{

    private $ingredientTranslationId;

    public function __construct($props)
    {
        $this->ingredientTranslationId = $props['id'] ;
    }

    private function get_IngredientTranslation(){
        return IngredientTranslation::find($this->ingredientTranslationId);
    }
    public function toArray(): array
    {
        return  $this->get_IngredientTranslation();
    }
}

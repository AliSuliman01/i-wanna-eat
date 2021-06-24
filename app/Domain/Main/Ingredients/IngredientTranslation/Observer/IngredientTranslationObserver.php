<?php


namespace App\Domain\Main\Ingredients\IngredientTranslation\Observer;

use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Support\Facades\Auth;


class IngredientTranslationObserver
{
	  /**
     * Handle the IngredientTranslation "created" event.
     *
     * @param  \App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation  $ingredientTranslation
     * @return void
     */
    public function created(IngredientTranslation $ingredientTranslation)
    {
        $ingredientTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the IngredientTranslation "updated" event.
     *
     * @param  \App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation  $ingredientTranslation
     * @return void
     */
    public function updated(IngredientTranslation $ingredientTranslation)
    {
        $ingredientTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the IngredientTranslation "deleted" event.
     *
     * @param  \App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation  $ingredientTranslation
     * @return void
     */
    public function deleted(IngredientTranslation $ingredientTranslation)
    {
        $ingredientTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the IngredientTranslation "restored" event.
     *
     * @param  \App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation  $ingredientTranslation
     * @return void
     */
    public function restored(IngredientTranslation $ingredientTranslation)
    {
        //
    }

    /**
     * Handle the IngredientTranslation "force deleted" event.
     *
     * @param  \App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation  $ingredientTranslation
     * @return void
     */
    public function forceDeleted(IngredientTranslation $ingredientTranslation)
    {
        //
    }
}

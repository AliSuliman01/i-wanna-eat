<?php


namespace App\Domain\Main\Ingredients\Ingredients\Observer;

use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Support\Facades\Auth;


class IngredientObserver
{
	  /**
     * Handle the Ingredient "created" event.
     *
     * @param  \App\Domain\Main\Ingredients\Ingredients\Model\Ingredient  $ingredient
     * @return void
     */
    public function created(Ingredient $ingredient)
    {
        $ingredient->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Ingredient "updated" event.
     *
     * @param  \App\Domain\Main\Ingredients\Ingredients\Model\Ingredient  $ingredient
     * @return void
     */
    public function updated(Ingredient $ingredient)
    {
        $ingredient->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Ingredient "deleted" event.
     *
     * @param  \App\Domain\Main\Ingredients\Ingredients\Model\Ingredient  $ingredient
     * @return void
     */
    public function deleted(Ingredient $ingredient)
    {
        $ingredient->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Ingredient "restored" event.
     *
     * @param  \App\Domain\Main\Ingredients\Ingredients\Model\Ingredient  $ingredient
     * @return void
     */
    public function restored(Ingredient $ingredient)
    {
        //
    }

    /**
     * Handle the Ingredient "force deleted" event.
     *
     * @param  \App\Domain\Main\Ingredients\Ingredients\Model\Ingredient  $ingredient
     * @return void
     */
    public function forceDeleted(Ingredient $ingredient)
    {
        //
    }
}

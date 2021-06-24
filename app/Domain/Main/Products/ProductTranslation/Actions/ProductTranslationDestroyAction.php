<?php


namespace App\Domain\Main\Products\ProductTranslation\Actions;


use App\Domain\Main\Products\ProductTranslation\DTO\ProductTranslationDTO;
use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Support\Facades\Auth;

class ProductTranslationDestroyAction
{
    public static function execute(
        ProductTranslationDTO   $productTranslationDTO
    ){

        $productTranslation = ProductTranslation::find($productTranslationDTO->id);
        $productTranslation->delete();
        return $productTranslation;
    }
}

<?php


namespace App\Domain\Main\Products\ProductTranslation\Actions;


use App\Domain\Main\Products\ProductTranslation\DTO\ProductTranslationDTO;
use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Support\Facades\Auth;

class ProductTranslationCreateAction
{
    public static function execute(
        ProductTranslationDTO $productTranslationDTO
    ){

        $productTranslation = new ProductTranslation($productTranslationDTO->toArray());
        $productTranslation->save();
        return $productTranslation;
    }
}

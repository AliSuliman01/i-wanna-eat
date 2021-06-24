<?php


namespace App\Domain\Main\Products\ProductTranslation\Actions;


use App\Domain\Main\Products\ProductTranslation\DTO\ProductTranslationDTO;
use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Support\Facades\Auth;

class ProductTranslationUpdateAction
{

    public static function execute(
        ProductTranslationDTO $productTranslationDTO
    ){
        $productTranslation = ProductTranslation::find($productTranslationDTO->id);
        $productTranslation->update(array_filter($productTranslationDTO->toArray()));
        $productTranslation->save();
        return $productTranslation;
    }
}

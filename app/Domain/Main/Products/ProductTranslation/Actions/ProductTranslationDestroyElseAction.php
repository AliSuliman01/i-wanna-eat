<?php


namespace App\Domain\Main\Products\ProductTranslation\Actions;


use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;

class ProductTranslationDestroyElseAction
{
    public static function execute($productId,$productTranslations){
        ProductTranslation::where('product_id',$productId)->whereNotIn('id',$productTranslations)->delete();
    }
}

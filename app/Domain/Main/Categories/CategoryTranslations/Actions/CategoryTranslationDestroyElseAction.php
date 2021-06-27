<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Actions;

use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;

class CategoryTranslationDestroyElseAction
{

    public static function execute($categoryId,$categoryTranslations){
        ProductTranslation::where('category_id',$categoryId)->whereNotIn('id',$categoryTranslations)->delete();
    }
}

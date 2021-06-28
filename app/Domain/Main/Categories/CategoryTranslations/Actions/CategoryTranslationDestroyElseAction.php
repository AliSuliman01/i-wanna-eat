<?php


namespace App\Domain\Main\Categories\CategoryTranslations\Actions;

use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;

class CategoryTranslationDestroyElseAction
{

    public static function execute($categoryId,$categoryTranslations){
        CategoryTranslation::where('category_id',$categoryId)->whereNotIn('id',$categoryTranslations)->delete();
    }
}

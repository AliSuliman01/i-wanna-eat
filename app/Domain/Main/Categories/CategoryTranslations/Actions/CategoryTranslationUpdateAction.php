<?php


namespace App\Domain\Main\Categories\CategoryTranslations\Actions;


use App\Domain\Main\Categories\CategoryTranslations\DTO\CategoryTranslationDTO;
use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class CategoryTranslationUpdateAction
{

    public static function execute(
        CategoryTranslationDTO $categoryTranslationDTO
    ){
        $categoryTranslation = CategoryTranslation::find($categoryTranslationDTO->id);
        $categoryTranslation->update(array_filter($categoryTranslationDTO->toArray()));
        $categoryTranslation->save();
        return $categoryTranslation;
    }
}

<?php


namespace App\Domain\Main\Categories\CategoryTranslations\Actions;


use App\Domain\Main\Categories\CategoryTranslations\DTO\CategoryTranslationDTO;
use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class CategoryTranslationCreateAction
{
    public static function execute(
        CategoryTranslationDTO $categoryTranslationDTO
    ){

        $categoryTranslation = new CategoryTranslation($categoryTranslationDTO->toArray());
        $categoryTranslation->save();
        return $categoryTranslation;
    }
}

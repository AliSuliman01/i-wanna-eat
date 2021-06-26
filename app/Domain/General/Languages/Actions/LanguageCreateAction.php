<?php


namespace App\Domain\General\Languages\Actions;


use App\Domain\General\Languages\DTO\LanguageDTO;
use App\Domain\General\Languages\Model\Language;
use Illuminate\Support\Facades\Auth;

class LanguageCreateAction
{
    public static function execute(
        LanguageDTO $languageDTO
    ){
        $language = new Language($languageDTO->toArray());
        $language->save();
        return $language;
    }
}

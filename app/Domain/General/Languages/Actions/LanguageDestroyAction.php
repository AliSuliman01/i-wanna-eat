<?php


namespace App\Domain\General\Languages\Actions;


use App\Domain\General\Languages\DTO\LanguageDTO;
use App\Domain\General\Languages\Model\Language;
use Illuminate\Support\Facades\Auth;

class LanguageDestroyAction
{
    public static function execute(
        LanguageDTO   $languageDTO
    ){

        $language = Language::find($languageDTO->id);
        $language->delete();
        return $language;
    }
}

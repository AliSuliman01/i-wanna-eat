<?php


namespace App\Domain\General\Regions\RegionTranslations\Actions;


use App\Domain\General\Regions\RegionTranslations\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslations\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTranslationCreateAction
{
    public static function execute(
        RegionTranslationDTO $regionTranslationDTO
    ){

        $regionTranslation = new RegionTranslation($regionTranslationDTO->toArray());
        $regionTranslation->save();
        return $regionTranslation;
    }
}

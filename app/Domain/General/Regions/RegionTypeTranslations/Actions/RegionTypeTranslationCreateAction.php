<?php


namespace App\Domain\General\Regions\RegionTypeTranslations\Actions;


use App\Domain\General\Regions\RegionTypeTranslations\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTypeTranslationCreateAction
{
    public static function execute(
        RegionTypeTranslationDTO $regionTypeTranslationDTO
    ){

        $regionTypeTranslation = new RegionTypeTranslation($regionTypeTranslationDTO->toArray());
        $regionTypeTranslation->save();
        return $regionTypeTranslation;
    }
}

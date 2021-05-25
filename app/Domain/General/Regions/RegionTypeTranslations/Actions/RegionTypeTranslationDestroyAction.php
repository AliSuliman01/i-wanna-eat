<?php


namespace App\Domain\General\Regions\RegionTypeTranslations\Actions;


use App\Domain\General\Regions\RegionTypeTranslations\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTypeTranslationDestroyAction
{
    public static function execute(
        RegionTypeTranslationDTO   $regionTypeTranslationDTO
    ){

        $regionTypeTranslation = RegionTypeTranslation::find($regionTypeTranslationDTO->id);
        $regionTypeTranslation->delete();
        return $regionTypeTranslation;
    }
}

<?php


namespace App\Domain\General\Regions\RegionTypeTranslations\Actions;


use App\Domain\General\Regions\RegionTypeTranslations\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTypeTranslationUpdateAction
{

    public static function execute(
        RegionTypeTranslationDTO $regionTypeTranslationDTO
    ){
        $regionTypeTranslation = RegionTypeTranslation::find($regionTypeTranslationDTO->id);
        $regionTypeTranslation->update(array_filter($regionTypeTranslationDTO->toArray()));
        $regionTypeTranslation->save();
        return $regionTypeTranslation;
    }
}

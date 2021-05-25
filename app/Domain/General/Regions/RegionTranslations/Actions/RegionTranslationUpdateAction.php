<?php


namespace App\Domain\General\Regions\RegionTranslations\Actions;


use App\Domain\General\Regions\RegionTranslations\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslations\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTranslationUpdateAction
{

    public static function execute(
        RegionTranslationDTO $regionTranslationDTO
    ){
        $regionTranslation = RegionTranslation::find($regionTranslationDTO->id);
        $regionTranslation->update(array_filter($regionTranslationDTO->toArray()));
        $regionTranslation->save();
        return $regionTranslation;
    }
}

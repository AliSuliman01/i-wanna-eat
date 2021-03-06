<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\Actions;


use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
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

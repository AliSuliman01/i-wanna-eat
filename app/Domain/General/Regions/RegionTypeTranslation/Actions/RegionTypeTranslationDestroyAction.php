<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\Actions;


use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
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

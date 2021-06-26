<?php


namespace App\Domain\General\Regions\RegionTranslation\Actions;


use App\Domain\General\Regions\RegionTranslation\DTO\RegionTranslationDTO;
use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;

class RegionTranslationDestroyAction
{
    public static function execute(
        RegionTranslationDTO   $regionTranslationDTO
    ){

        $regionTranslation = RegionTranslation::find($regionTranslationDTO->id);
        $regionTranslation->delete();
        return $regionTranslation;
    }
}

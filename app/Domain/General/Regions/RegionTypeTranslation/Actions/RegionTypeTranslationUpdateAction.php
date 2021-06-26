<?php


namespace App\Domain\General\Regions\RegionTypeTranslation\Actions;


use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
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

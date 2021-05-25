<?php


namespace App\Domain\General\Regions\RegionTypes\Actions;


use App\Domain\General\Regions\RegionTypes\DTO\RegionTypeDTO;
use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use Illuminate\Support\Facades\Auth;

class RegionTypeCreateAction
{
    public static function execute(
        RegionTypeDTO $regionTypeDTO
    ){

        $regionType = new RegionType($regionTypeDTO->toArray());
        $regionType->save();
        return $regionType;
    }
}

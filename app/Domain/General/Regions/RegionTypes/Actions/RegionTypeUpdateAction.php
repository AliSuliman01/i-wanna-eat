<?php


namespace App\Domain\General\Regions\RegionTypes\Actions;


use App\Domain\General\Regions\RegionTypes\DTO\RegionTypeDTO;
use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use Illuminate\Support\Facades\Auth;

class RegionTypeUpdateAction
{

    /**
     * @param RegionTypeDTO $regionTypeDTO
     * @return RegionType
     */
    public static function execute(
        RegionTypeDTO $regionTypeDTO
    ){
        $regionType = RegionType::find($regionTypeDTO->id);
        $regionType->update(array_filter($regionTypeDTO->toArray()));
        $regionType->save();
        return $regionType;
    }
}

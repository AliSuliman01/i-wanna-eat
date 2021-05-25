<?php


namespace App\Domain\General\Regions\Regions\Actions;


use App\Domain\General\Regions\Regions\DTO\RegionDTO;
use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Support\Facades\Auth;

class RegionUpdateAction
{

    public static function execute(
        RegionDTO $regionDTO
    ){
        $region = Region::find($regionDTO->id);
        $region->update(array_filter($regionDTO->toArray()));
        $region->save();
        return $region;
    }
}

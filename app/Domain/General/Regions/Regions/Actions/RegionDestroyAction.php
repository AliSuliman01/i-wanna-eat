<?php


namespace App\Domain\General\Regions\Regions\Actions;


use App\Domain\General\Regions\Regions\DTO\RegionDTO;
use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Support\Facades\Auth;

class RegionDestroyAction
{
    public static function execute(
        RegionDTO   $regionDTO
    ){
        $region = Region::find($regionDTO->id);
        $region->delete();
        return $region;
    }
}

<?php


namespace App\Domain\General\Regions\Regions\Actions;


use App\Domain\General\Regions\Regions\DTO\RegionDTO;
use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Support\Facades\Auth;

class RegionCreateAction
{
    public static function execute(
        RegionDTO $regionDTO
    ){

        $region = new Region($regionDTO->toArray());
        $region->save();
        return $region;
    }
}

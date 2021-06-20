<?php


namespace App\Http\ViewModels\General\Regions\RegionTypes;

use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use Illuminate\Contracts\Support\Arrayable;


class RegionTypeShowVM implements Arrayable
{

    private $regionTypeId;

    public function __construct($regionTypeId)
    {
        $this->regionTypeId = $regionTypeId ;
    }

    private function get_RegionType(){
        return RegionType::with('translations')->find($this->regionTypeId);
    }
    public function toArray(): array
    {
        return $this->get_RegionType()->toArray();
    }
}

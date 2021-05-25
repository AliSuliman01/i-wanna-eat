<?php


namespace App\Http\ViewModels\General\Regions\Regions;

use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Contracts\Support\Arrayable;


class RegionShowVM implements Arrayable
{

    private $regionId;

    public function __construct($regionId)
    {
        $this->regionId = $regionId ;
    }

    private function get_Region(){
        return Region::find($this->regionId);
    }
    public function toArray(): array
    {
        return [
            'Region' => $this->get_Region()
        ];
    }
}

<?php


namespace App\Http\ViewModels\General\Regions\RegionTypes;

use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use Illuminate\Contracts\Support\Arrayable;

class RegionTypeIndexVM implements Arrayable
{

    public function get_region_types(){
    	return RegionType::all();
	}
    public function toArray(): array
    {
        return [
            'region_types' => $this->get_region_types()
        ];
    }
}

<?php


namespace App\Http\ViewModels\General\Regions\Regions;

use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Contracts\Support\Arrayable;

class RegionIndexVM implements Arrayable
{

    public function get_regions(){
    	return Region::all();
	}
    public function toArray(): array
    {
        return [
            'regions' => $this->get_regions()
        ];
    }
}

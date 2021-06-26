<?php


namespace App\Http\ViewModels\General\Regions\RegionTypeTranslation;

use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;

class RegionTypeTranslationIndexVM implements Arrayable
{

    public function get_region_type_translations(){
    	return RegionTypeTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_region_type_translations()->toArray();
    }
}

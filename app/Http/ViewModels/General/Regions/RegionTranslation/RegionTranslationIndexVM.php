<?php


namespace App\Http\ViewModels\General\Regions\RegionTranslation;

use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Contracts\Support\Arrayable;

class RegionTranslationIndexVM implements Arrayable
{

    public function get_region_translations(){
    	return RegionTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_region_translations()->toArray();
    }
}

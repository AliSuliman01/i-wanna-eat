<?php


namespace App\Http\ViewModels\General\Regions\RegionTranslations;

use App\Domain\General\Regions\RegionTranslations\Model\RegionTranslation;
use Illuminate\Contracts\Support\Arrayable;

class RegionTranslationIndexVM implements Arrayable
{

    public function get_region_translations(){
    	return RegionTranslation::all();
	}
    public function toArray(): array
    {
        return [
            'region_translations' => $this->get_region_translations()
        ];
    }
}

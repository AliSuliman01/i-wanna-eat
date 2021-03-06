<?php


namespace App\Http\ViewModels\General\Regions\RegionTypeTranslation;

use App\Domain\General\Regions\RegionTypeTranslation\Model\RegionTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;


class RegionTypeTranslationShowVM implements Arrayable
{

    private $regionTypeTranslationId;

    public function __construct($regionTypeTranslationId)
    {
        $this->regionTypeTranslationId = $regionTypeTranslationId ;
    }

    private function get_RegionTypeTranslation(){
        return RegionTypeTranslation::find($this->regionTypeTranslationId);
    }
    public function toArray(): array
    {
        return $this->get_RegionTypeTranslation()->toArray();
    }
}

<?php


namespace App\Http\ViewModels\General\Regions\RegionTranslation;

use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Contracts\Support\Arrayable;


class RegionTranslationShowVM implements Arrayable
{

    private $regionTranslationId;

    public function __construct($regionTranslationId)
    {
        $this->regionTranslationId = $regionTranslationId ;
    }

    private function get_RegionTranslation(){
        return RegionTranslation::find($this->regionTranslationId);
    }
    public function toArray(): array
    {
        return $this->get_RegionTranslation()->toArray();
    }
}

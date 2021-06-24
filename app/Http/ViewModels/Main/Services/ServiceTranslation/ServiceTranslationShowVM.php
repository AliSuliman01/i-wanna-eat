<?php


namespace App\Http\ViewModels\Main\Services\ServiceTranslation;

use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ServiceTranslationShowVM implements Arrayable
{

    private $serviceTranslationId;

    public function __construct($props)
    {
        $this->serviceTranslationId = $props['id'] ;
    }

    private function get_ServiceTranslation(){
        return ServiceTranslation::find($this->serviceTranslationId);
    }
    public function toArray(): array
    {
        return  $this->get_ServiceTranslation()->toArray();
    }
}

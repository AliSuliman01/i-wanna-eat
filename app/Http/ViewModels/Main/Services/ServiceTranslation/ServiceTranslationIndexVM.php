<?php


namespace App\Http\ViewModels\Main\Services\ServiceTranslation;

use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ServiceTranslationIndexVM implements Arrayable
{

    public function get_service_translation(){
    	return ServiceTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_service_translation()->toArray();
    }
}

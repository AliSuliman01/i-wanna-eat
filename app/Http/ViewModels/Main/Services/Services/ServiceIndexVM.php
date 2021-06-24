<?php


namespace App\Http\ViewModels\Main\Services\Services;

use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Contracts\Support\Arrayable;

class ServiceIndexVM implements Arrayable
{

    public function get_services(){
    	return Service::all();
	}
    public function toArray(): array
    {
        return $this->get_services()->toArray();
    }
}

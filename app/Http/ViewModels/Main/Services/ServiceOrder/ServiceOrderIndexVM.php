<?php


namespace App\Http\ViewModels\Main\Services\ServiceOrder;

use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use Illuminate\Contracts\Support\Arrayable;

class ServiceOrderIndexVM implements Arrayable
{

    public function get_service_order(){
    	return ServiceOrder::all();
	}
    public function toArray(): array
    {
        return $this->get_service_order()->toArray();
    }
}

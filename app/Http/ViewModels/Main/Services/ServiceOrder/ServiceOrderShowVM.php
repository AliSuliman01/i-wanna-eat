<?php


namespace App\Http\ViewModels\Main\Services\ServiceOrder;

use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use Illuminate\Contracts\Support\Arrayable;


class ServiceOrderShowVM implements Arrayable
{

    private $serviceOrderId;

    public function __construct($props)
    {
        $this->serviceOrderId = $props['id'] ;
    }

    private function get_ServiceOrder(){
        return ServiceOrder::find($this->serviceOrderId);
    }
    public function toArray(): array
    {
        return  $this->get_ServiceOrder()->toArray();
    }
}

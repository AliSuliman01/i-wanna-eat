<?php


namespace App\Http\ViewModels\Main\Services\Services;

use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Contracts\Support\Arrayable;


class ServiceShowVM implements Arrayable
{

    private $serviceId;

    public function __construct($props)
    {
        $this->serviceId = $props['id'] ;
    }

    private function get_Service(){
        return Service::find($this->serviceId);
    }
    public function toArray(): array
    {
        return  $this->get_Service()->toArray();
    }
}

<?php


namespace App\Domain\Main\Services\Services\Actions;


use App\Domain\Main\Services\Services\DTO\ServiceDTO;
use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Support\Facades\Auth;

class ServiceDestroyAction
{
    public static function execute(
        ServiceDTO   $serviceDTO
    ){

        $service = Service::find($serviceDTO->id);
        $service->delete();
        return $service;
    }
}

<?php


namespace App\Domain\Main\Services\Services\Actions;


use App\Domain\Main\Services\Services\DTO\ServiceDTO;
use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Support\Facades\Auth;

class ServiceUpdateAction
{

    public static function execute(
        ServiceDTO $serviceDTO
    ){
        $service = Service::find($serviceDTO->id);
        $service->update(array_filter($serviceDTO->toArray()));
        $service->save();
        return $service;
    }
}

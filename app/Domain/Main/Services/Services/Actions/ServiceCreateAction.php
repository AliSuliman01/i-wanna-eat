<?php


namespace App\Domain\Main\Services\Services\Actions;


use App\Domain\Main\Services\Services\DTO\ServiceDTO;
use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Support\Facades\Auth;

class ServiceCreateAction
{
    public static function execute(
        ServiceDTO $serviceDTO
    ){

        $service = new Service($serviceDTO->toArray());
        $service->save();
        return $service;
    }
}

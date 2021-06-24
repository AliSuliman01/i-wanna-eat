<?php


namespace App\Domain\Main\Services\ServiceOrder\Actions;


use App\Domain\Main\Services\ServiceOrder\DTO\ServiceOrderDTO;
use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use Illuminate\Support\Facades\Auth;

class ServiceOrderCreateAction
{
    public static function execute(
        ServiceOrderDTO $serviceOrderDTO
    ){

        $serviceOrder = new ServiceOrder($serviceOrderDTO->toArray());
        $serviceOrder->save();
        return $serviceOrder;
    }
}

<?php


namespace App\Domain\Main\Services\ServiceOrder\Actions;


use App\Domain\Main\Services\ServiceOrder\DTO\ServiceOrderDTO;
use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use Illuminate\Support\Facades\Auth;

class ServiceOrderUpdateAction
{

    public static function execute(
        ServiceOrderDTO $serviceOrderDTO
    ){
        $serviceOrder = ServiceOrder::find($serviceOrderDTO->id);
        $serviceOrder->update(array_filter($serviceOrderDTO->toArray()));
        $serviceOrder->save();
        return $serviceOrder;
    }
}

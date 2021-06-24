<?php


namespace App\Domain\Main\Services\ServiceTranslation\Actions;


use App\Domain\Main\Services\ServiceTranslation\DTO\ServiceTranslationDTO;
use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;

class ServiceTranslationUpdateAction
{

    public static function execute(
        ServiceTranslationDTO $serviceTranslationDTO
    ){
        $serviceTranslation = ServiceTranslation::find($serviceTranslationDTO->id);
        $serviceTranslation->update(array_filter($serviceTranslationDTO->toArray()));
        $serviceTranslation->save();
        return $serviceTranslation;
    }
}

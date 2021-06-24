<?php


namespace App\Domain\Main\Services\ServiceTranslation\Actions;


use App\Domain\Main\Services\ServiceTranslation\DTO\ServiceTranslationDTO;
use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;

class ServiceTranslationCreateAction
{
    public static function execute(
        ServiceTranslationDTO $serviceTranslationDTO
    ){

        $serviceTranslation = new ServiceTranslation($serviceTranslationDTO->toArray());
        $serviceTranslation->save();
        return $serviceTranslation;
    }
}

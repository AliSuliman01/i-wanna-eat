<?php


namespace App\Domain\Main\Services\ServiceTranslation\Actions;


use App\Domain\Main\Services\ServiceTranslation\DTO\ServiceTranslationDTO;
use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;

class ServiceTranslationDestroyAction
{
    public static function execute(
        ServiceTranslationDTO   $serviceTranslationDTO
    ){

        $serviceTranslation = ServiceTranslation::find($serviceTranslationDTO->id);
        $serviceTranslation->delete();
        return $serviceTranslation;
    }
}

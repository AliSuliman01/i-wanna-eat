<?php


namespace App\Http\Controllers\Main\Services\ServiceTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Services\ServiceTranslation\Actions\ServiceTranslationCreateAction;
use App\Domain\Main\Services\ServiceTranslation\Actions\ServiceTranslationDestroyAction;
use App\Domain\Main\Services\ServiceTranslation\Actions\ServiceTranslationUpdateAction;
use App\Domain\Main\Services\ServiceTranslation\DTO\ServiceTranslationDTO;
use App\Http\Requests\Main\Services\ServiceTranslation\ServiceTranslationCreateRequest;
use App\Http\Requests\Main\Services\ServiceTranslation\ServiceTranslationUpdateRequest;
use App\Http\Requests\Main\Services\ServiceTranslation\ServiceTranslationDestroyRequest;
use App\Http\Requests\Main\Services\ServiceTranslation\ServiceTranslationShowRequest;
use App\Http\ViewModels\Main\Services\ServiceTranslation\ServiceTranslationShowVM;
use App\Http\ViewModels\Main\Services\ServiceTranslation\ServiceTranslationIndexVM;

class ServiceTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ServiceTranslationIndexVM())->toArray()));
    }

    public function show(ServiceTranslationShowRequest $serviceTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ServiceTranslationShowVM(['id' => $serviceTranslationShowRequest->route('id')]))->toArray()));
    }

    public function create(ServiceTranslationCreateRequest $serviceTranslationCreateRequest){
        $data = $serviceTranslationCreateRequest->validated() ;

        $serviceTranslationDTO = ServiceTranslationDTO::fromRequest($data);
        
        $serviceTranslation = ServiceTranslationCreateAction::execute($serviceTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceTranslationShowVM($serviceTranslation->toArray()))->toArray()));
    }

    public function update(ServiceTranslationUpdateRequest $serviceTranslationUpdateRequest){
        $data = $serviceTranslationUpdateRequest->validated() ;

        $serviceTranslationDTO = ServiceTranslationDTO::fromRequest($data);
        
        $serviceTranslation = ServiceTranslationUpdateAction::execute($serviceTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceTranslationShowVM($serviceTranslation->toArray()))->toArray()));
    }

    public function destroy(ServiceTranslationDestroyRequest $serviceTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ServiceTranslationDestroyAction::execute(ServiceTranslationDTO::fromRequest($serviceTranslationDestroyRequest->validated()))));
    }

}

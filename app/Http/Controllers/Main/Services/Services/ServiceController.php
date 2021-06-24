<?php


namespace App\Http\Controllers\Main\Services\Services;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Services\Services\Actions\ServiceCreateAction;
use App\Domain\Main\Services\Services\Actions\ServiceDestroyAction;
use App\Domain\Main\Services\Services\Actions\ServiceUpdateAction;
use App\Domain\Main\Services\Services\DTO\ServiceDTO;
use App\Http\Requests\Main\Services\Services\ServiceCreateRequest;
use App\Http\Requests\Main\Services\Services\ServiceUpdateRequest;
use App\Http\Requests\Main\Services\Services\ServiceDestroyRequest;
use App\Http\Requests\Main\Services\Services\ServiceShowRequest;
use App\Http\ViewModels\Main\Services\Services\ServiceShowVM;
use App\Http\ViewModels\Main\Services\Services\ServiceIndexVM;

class ServiceController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ServiceIndexVM())->toArray()));
    }

    public function show(ServiceShowRequest $serviceShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ServiceShowVM(['id' => $serviceShowRequest->route('id')]))->toArray()));
    }

    public function create(ServiceCreateRequest $serviceCreateRequest){
        $data = $serviceCreateRequest->validated() ;

        $serviceDTO = ServiceDTO::fromRequest($data);
        
        $service = ServiceCreateAction::execute($serviceDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceShowVM($service->toArray()))->toArray()));
    }

    public function update(ServiceUpdateRequest $serviceUpdateRequest){
        $data = $serviceUpdateRequest->validated() ;

        $serviceDTO = ServiceDTO::fromRequest($data);
        
        $service = ServiceUpdateAction::execute($serviceDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceShowVM($service->toArray()))->toArray()));
    }

    public function destroy(ServiceDestroyRequest $serviceDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ServiceDestroyAction::execute(ServiceDTO::fromRequest($serviceDestroyRequest->validated()))));
    }

}

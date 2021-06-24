<?php


namespace App\Http\Controllers\Main\Services\ServiceOrder;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Services\ServiceOrder\Actions\ServiceOrderCreateAction;
use App\Domain\Main\Services\ServiceOrder\Actions\ServiceOrderDestroyAction;
use App\Domain\Main\Services\ServiceOrder\Actions\ServiceOrderUpdateAction;
use App\Domain\Main\Services\ServiceOrder\DTO\ServiceOrderDTO;
use App\Http\Requests\Main\Services\ServiceOrder\ServiceOrderCreateRequest;
use App\Http\Requests\Main\Services\ServiceOrder\ServiceOrderUpdateRequest;
use App\Http\Requests\Main\Services\ServiceOrder\ServiceOrderDestroyRequest;
use App\Http\Requests\Main\Services\ServiceOrder\ServiceOrderShowRequest;
use App\Http\ViewModels\Main\Services\ServiceOrder\ServiceOrderShowVM;
use App\Http\ViewModels\Main\Services\ServiceOrder\ServiceOrderIndexVM;

class ServiceOrderController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ServiceOrderIndexVM())->toArray()));
    }

    public function show(ServiceOrderShowRequest $serviceOrderShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ServiceOrderShowVM(['id' => $serviceOrderShowRequest->route('id')]))->toArray()));
    }

    public function create(ServiceOrderCreateRequest $serviceOrderCreateRequest){
        $data = $serviceOrderCreateRequest->validated() ;

        $serviceOrderDTO = ServiceOrderDTO::fromRequest($data);
        
        $serviceOrder = ServiceOrderCreateAction::execute($serviceOrderDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceOrderShowVM($serviceOrder->toArray()))->toArray()));
    }

    public function update(ServiceOrderUpdateRequest $serviceOrderUpdateRequest){
        $data = $serviceOrderUpdateRequest->validated() ;

        $serviceOrderDTO = ServiceOrderDTO::fromRequest($data);
        
        $serviceOrder = ServiceOrderUpdateAction::execute($serviceOrderDTO);

        return response()->json(Helpers::createSuccessResponse((new ServiceOrderShowVM($serviceOrder->toArray()))->toArray()));
    }

    public function destroy(ServiceOrderDestroyRequest $serviceOrderDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ServiceOrderDestroyAction::execute(ServiceOrderDTO::fromRequest($serviceOrderDestroyRequest->validated()))));
    }

}

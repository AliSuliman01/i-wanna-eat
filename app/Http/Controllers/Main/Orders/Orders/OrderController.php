<?php


namespace App\Http\Controllers\Main\Orders\Orders;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Orders\Orders\Actions\OrderCreateAction;
use App\Domain\Main\Orders\Orders\Actions\OrderDestroyAction;
use App\Domain\Main\Orders\Orders\Actions\OrderUpdateAction;
use App\Domain\Main\Orders\Orders\DTO\OrderDTO;
use App\Http\Requests\Main\Orders\Orders\OrderCreateRequest;
use App\Http\Requests\Main\Orders\Orders\OrderUpdateRequest;
use App\Http\Requests\Main\Orders\Orders\OrderDestroyRequest;
use App\Http\Requests\Main\Orders\Orders\OrderShowRequest;
use App\Http\ViewModels\Main\Orders\Orders\OrderShowVM;
use App\Http\ViewModels\Main\Orders\Orders\OrderIndexVM;

class OrderController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new OrderIndexVM())->toArray()));
    }

    public function show(OrderShowRequest $orderShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new OrderShowVM(['id' => $orderShowRequest->route('id')]))->toArray()));
    }

    public function create(OrderCreateRequest $orderCreateRequest){
        $data = $orderCreateRequest->validated() ;

        $orderDTO = OrderDTO::fromRequest($data);
        
        $order = OrderCreateAction::execute($orderDTO);

        return response()->json(Helpers::createSuccessResponse((new OrderShowVM($order->toArray()))->toArray()));
    }

    public function update(OrderUpdateRequest $orderUpdateRequest){
        $data = $orderUpdateRequest->validated() ;

        $orderDTO = OrderDTO::fromRequest($data);
        
        $order = OrderUpdateAction::execute($orderDTO);

        return response()->json(Helpers::createSuccessResponse((new OrderShowVM($order->toArray()))->toArray()));
    }

    public function destroy(OrderDestroyRequest $orderDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(OrderDestroyAction::execute(OrderDTO::fromRequest($orderDestroyRequest->validated()))));
    }

}

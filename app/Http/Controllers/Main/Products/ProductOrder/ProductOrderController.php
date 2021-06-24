<?php


namespace App\Http\Controllers\Main\Products\ProductOrder;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Products\ProductOrder\Actions\ProductOrderCreateAction;
use App\Domain\Main\Products\ProductOrder\Actions\ProductOrderDestroyAction;
use App\Domain\Main\Products\ProductOrder\Actions\ProductOrderUpdateAction;
use App\Domain\Main\Products\ProductOrder\DTO\ProductOrderDTO;
use App\Http\Requests\Main\Products\ProductOrder\ProductOrderCreateRequest;
use App\Http\Requests\Main\Products\ProductOrder\ProductOrderUpdateRequest;
use App\Http\Requests\Main\Products\ProductOrder\ProductOrderDestroyRequest;
use App\Http\Requests\Main\Products\ProductOrder\ProductOrderShowRequest;
use App\Http\ViewModels\Main\Products\ProductOrder\ProductOrderShowVM;
use App\Http\ViewModels\Main\Products\ProductOrder\ProductOrderIndexVM;

class ProductOrderController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ProductOrderIndexVM())->toArray()));
    }

    public function show(ProductOrderShowRequest $productOrderShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ProductOrderShowVM(['id' => $productOrderShowRequest->route('id')]))->toArray()));
    }

    public function create(ProductOrderCreateRequest $productOrderCreateRequest){
        $data = $productOrderCreateRequest->validated() ;

        $productOrderDTO = ProductOrderDTO::fromRequest($data);
        
        $productOrder = ProductOrderCreateAction::execute($productOrderDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductOrderShowVM($productOrder->toArray()))->toArray()));
    }

    public function update(ProductOrderUpdateRequest $productOrderUpdateRequest){
        $data = $productOrderUpdateRequest->validated() ;

        $productOrderDTO = ProductOrderDTO::fromRequest($data);
        
        $productOrder = ProductOrderUpdateAction::execute($productOrderDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductOrderShowVM($productOrder->toArray()))->toArray()));
    }

    public function destroy(ProductOrderDestroyRequest $productOrderDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductOrderDestroyAction::execute(ProductOrderDTO::fromRequest($productOrderDestroyRequest->validated()))));
    }

}

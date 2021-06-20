<?php


namespace App\Http\Controllers\Main\Restaurants\Restaurants;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Restaurants\Restaurants\Actions\RestaurantCreateAction;
use App\Domain\Main\Restaurants\Restaurants\Actions\RestaurantDestroyAction;
use App\Domain\Main\Restaurants\Restaurants\Actions\RestaurantUpdateAction;
use App\Domain\Main\Restaurants\Restaurants\DTO\RestaurantDTO;
use App\Http\Requests\Main\Restaurants\Restaurants\RestaurantCreateRequest;
use App\Http\Requests\Main\Restaurants\Restaurants\RestaurantUpdateRequest;
use App\Http\Requests\Main\Restaurants\Restaurants\RestaurantDestroyRequest;
use App\Http\Requests\Main\Restaurants\Restaurants\RestaurantShowRequest;
use App\Http\ViewModels\Main\Restaurants\Restaurants\RestaurantShowVM;
use App\Http\ViewModels\Main\Restaurants\Restaurants\RestaurantIndexVM;

class RestaurantController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RestaurantIndexVM())->toArray()));
    }

    public function show(RestaurantShowRequest $restaurantShowRequest){

        return response()->json(Helpers::createSuccessResponse((new RestaurantShowVM(['id' => $restaurantShowRequest->route('id')]))->toArray()));
    }

    public function create(RestaurantCreateRequest $restaurantCreateRequest){
        $data = $restaurantCreateRequest->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        $restaurant = RestaurantCreateAction::execute($restaurantDTO);

        return response()->json(Helpers::createSuccessResponse((new RestaurantShowVM($restaurant->toArray()))->toArray()));
    }

    public function update(RestaurantUpdateRequest $restaurantUpdateRequest){
        $data = $restaurantUpdateRequest->validated() ;

        $restaurantDTO = RestaurantDTO::fromRequest($data);

        $restaurant = RestaurantUpdateAction::execute($restaurantDTO);

        return response()->json(Helpers::createSuccessResponse((new RestaurantShowVM($restaurant->toArray()))->toArray()));
    }

    public function destroy(RestaurantDestroyRequest $restaurantDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RestaurantDestroyAction::execute(RestaurantDTO::fromRequest($restaurantDestroyRequest->validated()))));
    }

}

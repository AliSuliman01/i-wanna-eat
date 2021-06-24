<?php


namespace App\Http\Controllers\Main\Restaurants\RestaurantPhotos;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Restaurants\RestaurantPhotos\Actions\RestaurantPhotoCreateAction;
use App\Domain\Main\Restaurants\RestaurantPhotos\Actions\RestaurantPhotoDestroyAction;
use App\Domain\Main\Restaurants\RestaurantPhotos\Actions\RestaurantPhotoUpdateAction;
use App\Domain\Main\Restaurants\RestaurantPhotos\DTO\RestaurantPhotoDTO;
use App\Http\Requests\Main\Restaurants\RestaurantPhotos\RestaurantPhotoCreateRequest;
use App\Http\Requests\Main\Restaurants\RestaurantPhotos\RestaurantPhotoUpdateRequest;
use App\Http\Requests\Main\Restaurants\RestaurantPhotos\RestaurantPhotoDestroyRequest;
use App\Http\Requests\Main\Restaurants\RestaurantPhotos\RestaurantPhotoShowRequest;
use App\Http\ViewModels\Main\Restaurants\RestaurantPhotos\RestaurantPhotoShowVM;
use App\Http\ViewModels\Main\Restaurants\RestaurantPhotos\RestaurantPhotoIndexVM;

class RestaurantPhotoController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RestaurantPhotoIndexVM())->toArray()));
    }

    public function show(RestaurantPhotoShowRequest $restaurantPhotoShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new RestaurantPhotoShowVM(['id' => $restaurantPhotoShowRequest->route('id')]))->toArray()));
    }

    public function create(RestaurantPhotoCreateRequest $restaurantPhotoCreateRequest){
        $data = $restaurantPhotoCreateRequest->validated() ;

        $restaurantPhotoDTO = RestaurantPhotoDTO::fromRequest($data);
        
        $restaurantPhoto = RestaurantPhotoCreateAction::execute($restaurantPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new RestaurantPhotoShowVM($restaurantPhoto->toArray()))->toArray()));
    }

    public function update(RestaurantPhotoUpdateRequest $restaurantPhotoUpdateRequest){
        $data = $restaurantPhotoUpdateRequest->validated() ;

        $restaurantPhotoDTO = RestaurantPhotoDTO::fromRequest($data);
        
        $restaurantPhoto = RestaurantPhotoUpdateAction::execute($restaurantPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new RestaurantPhotoShowVM($restaurantPhoto->toArray()))->toArray()));
    }

    public function destroy(RestaurantPhotoDestroyRequest $restaurantPhotoDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RestaurantPhotoDestroyAction::execute(RestaurantPhotoDTO::fromRequest($restaurantPhotoDestroyRequest->validated()))));
    }

}

<?php


namespace App\Http\Controllers\Main\Categories\CategoryPhotos;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoCreateAction;
use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoDestroyAction;
use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoUpdateAction;
use App\Domain\Main\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Http\Requests\Main\Categories\CategoryPhotos\CategoryPhotoCreateRequest;
use App\Http\Requests\Main\Categories\CategoryPhotos\CategoryPhotoUpdateRequest;
use App\Http\Requests\Main\Categories\CategoryPhotos\CategoryPhotoDestroyRequest;
use App\Http\Requests\Main\Categories\CategoryPhotos\CategoryPhotoShowRequest;
use App\Http\ViewModels\Main\Categories\CategoryPhotos\CategoryPhotoShowVM;
use App\Http\ViewModels\Main\Categories\CategoryPhotos\CategoryPhotoIndexVM;

class CategoryPhotoController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryPhotoIndexVM())->toArray()));
    }

    public function show(CategoryPhotoShowRequest $categoryPhotoShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new CategoryPhotoShowVM(['id' => $categoryPhotoShowRequest->route('id')]))->toArray()));
    }

    public function create(CategoryPhotoCreateRequest $categoryPhotoCreateRequest){
        $data = $categoryPhotoCreateRequest->validated() ;

        $categoryPhotoDTO = CategoryPhotoDTO::fromRequest($data);
        
        $categoryPhoto = CategoryPhotoCreateAction::execute($categoryPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryPhotoShowVM($categoryPhoto->toArray()))->toArray()));
    }

    public function update(CategoryPhotoUpdateRequest $categoryPhotoUpdateRequest){
        $data = $categoryPhotoUpdateRequest->validated() ;

        $categoryPhotoDTO = CategoryPhotoDTO::fromRequest($data);
        
        $categoryPhoto = CategoryPhotoUpdateAction::execute($categoryPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryPhotoShowVM($categoryPhoto->toArray()))->toArray()));
    }

    public function destroy(CategoryPhotoDestroyRequest $categoryPhotoDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(CategoryPhotoDestroyAction::execute(CategoryPhotoDTO::fromRequest($categoryPhotoDestroyRequest->validated()))));
    }

}

<?php


namespace App\Http\Controllers\Main\Categories\CategoryTranslations;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationCreateAction;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationDestroyAction;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationUpdateAction;
use App\Domain\Main\Categories\CategoryTranslations\DTO\CategoryTranslationDTO;
use App\Http\Requests\Main\Categories\CategoryTranslations\CategoryTranslationCreateRequest;
use App\Http\Requests\Main\Categories\CategoryTranslations\CategoryTranslationUpdateRequest;
use App\Http\Requests\Main\Categories\CategoryTranslations\CategoryTranslationDestroyRequest;
use App\Http\Requests\Main\Categories\CategoryTranslations\CategoryTranslationShowRequest;
use App\Http\ViewModels\Main\Categories\CategoryTranslations\CategoryTranslationShowVM;
use App\Http\ViewModels\Main\Categories\CategoryTranslations\CategoryTranslationIndexVM;

class CategoryTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryTranslationIndexVM())->toArray()));
    }

    public function show(CategoryTranslationShowRequest $categoryTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new CategoryTranslationShowVM(['id' => $categoryTranslationShowRequest->route('id')]))->toArray()));
    }

    public function create(CategoryTranslationCreateRequest $categoryTranslationCreateRequest){
        $data = $categoryTranslationCreateRequest->validated() ;

        $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($data);
        
        $categoryTranslation = CategoryTranslationCreateAction::execute($categoryTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryTranslationShowVM($categoryTranslation->toArray()))->toArray()));
    }

    public function update(CategoryTranslationUpdateRequest $categoryTranslationUpdateRequest){
        $data = $categoryTranslationUpdateRequest->validated() ;

        $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($data);
        
        $categoryTranslation = CategoryTranslationUpdateAction::execute($categoryTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryTranslationShowVM($categoryTranslation->toArray()))->toArray()));
    }

    public function destroy(CategoryTranslationDestroyRequest $categoryTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(CategoryTranslationDestroyAction::execute(CategoryTranslationDTO::fromRequest($categoryTranslationDestroyRequest->validated()))));
    }

}

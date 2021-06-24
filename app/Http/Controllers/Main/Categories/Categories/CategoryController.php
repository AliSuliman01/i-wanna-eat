<?php


namespace App\Http\Controllers\Main\Categories\Categories;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Categories\Categories\Actions\CategoryCreateAction;
use App\Domain\Main\Categories\Categories\Actions\CategoryDestroyAction;
use App\Domain\Main\Categories\Categories\Actions\CategoryUpdateAction;
use App\Domain\Main\Categories\Categories\DTO\CategoryDTO;
use App\Http\Requests\Main\Categories\Categories\CategoryCreateRequest;
use App\Http\Requests\Main\Categories\Categories\CategoryUpdateRequest;
use App\Http\Requests\Main\Categories\Categories\CategoryDestroyRequest;
use App\Http\Requests\Main\Categories\Categories\CategoryShowRequest;
use App\Http\ViewModels\Main\Categories\Categories\CategoryShowVM;
use App\Http\ViewModels\Main\Categories\Categories\CategoryIndexVM;

class CategoryController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryIndexVM())->toArray()));
    }

    public function show(CategoryShowRequest $categoryShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM(['id' => $categoryShowRequest->route('id')]))->toArray()));
    }

    public function create(CategoryCreateRequest $categoryCreateRequest){
        $data = $categoryCreateRequest->validated() ;

        $categoryDTO = CategoryDTO::fromRequest($data);
        
        $category = CategoryCreateAction::execute($categoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function update(CategoryUpdateRequest $categoryUpdateRequest){
        $data = $categoryUpdateRequest->validated() ;

        $categoryDTO = CategoryDTO::fromRequest($data);
        
        $category = CategoryUpdateAction::execute($categoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function destroy(CategoryDestroyRequest $categoryDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(CategoryDestroyAction::execute(CategoryDTO::fromRequest($categoryDestroyRequest->validated()))));
    }

}

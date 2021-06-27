<?php


namespace App\Http\Controllers\Main\Categories\Categories;


use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoCreateAction;
use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoDestroyElseAction;
use App\Domain\Main\Categories\CategoryPhotos\Actions\CategoryPhotoUpdateAction;
use App\Domain\Main\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationCreateAction;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationDestroyElseAction;
use App\Domain\Main\Categories\CategoryTranslations\Actions\CategoryTranslationUpdateAction;
use App\Domain\Main\Categories\CategoryTranslations\DTO\CategoryTranslationDTO;
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

        foreach ($data['translations'] as $translation){
            CategoryTranslationCreateAction::execute(CategoryTranslationDTO::fromRequest($translation + ['category_id' => $category->id]));
        }

        foreach ($data['photos'] ?? [] as $photo){
            CategoryPhotoCreateAction::execute(CategoryPhotoDTO::fromRequest($photo + ['category_id' => $category->id]));
        }
        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function update(CategoryUpdateRequest $categoryUpdateRequest){
        $data = $categoryUpdateRequest->validated() ;
        $categoryDTO = CategoryDTO::fromRequest($data);
        $category = CategoryUpdateAction::execute($categoryDTO);


        $categoryTranslations = [];
        foreach ($data['translations'] ?? [] as $translation){
            isset($translation['id']) ?
                $categoryTranslation = CategoryTranslationUpdateAction::execute(CategoryTranslationDTO::fromRequest($translation)):
                $categoryTranslation = CategoryTranslationCreateAction::execute(CategoryTranslationDTO::fromRequest($translation + ['category_id' => $category->id]));
            $categoryTranslations += $categoryTranslation->id;
        }
        CategoryTranslationDestroyElseAction::execute($category->id,$categoryTranslations);


        $categoryPhotos = [];
        foreach ($data['photos'] ?? [] as $photo){
            isset($photo['id']) ?
            $categoryPhoto = CategoryPhotoUpdateAction::execute(CategoryPhotoDTO::fromRequest($photo)):
            $categoryPhoto = CategoryPhotoCreateAction::execute(CategoryPhotoDTO::fromRequest($photo + ['category_id' => $category->id]));
            $categoryPhotos += $categoryPhoto->id;
        }
        CategoryPhotoDestroyElseAction::execute($category->id,$categoryPhotos);

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function destroy(CategoryDestroyRequest $categoryDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(CategoryDestroyAction::execute(CategoryDTO::fromRequest($categoryDestroyRequest->validated()))));
    }

}

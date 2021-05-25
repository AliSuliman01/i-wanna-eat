<?php


namespace App\Http\Controllers\General\Languages;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Languages\Actions\LanguageCreateAction;
use App\Domain\General\Languages\Actions\LanguageDestroyAction;
use App\Domain\General\Languages\Actions\LanguageUpdateAction;
use App\Domain\General\Languages\DTO\LanguageDTO;
use App\Http\Requests\General\Languages\LanguageCreateRequest;
use App\Http\Requests\General\Languages\LanguageUpdateRequest;
use App\Http\Requests\General\Languages\LanguageDestroyRequest;
use App\Http\Requests\General\Languages\LanguageShowRequest;
use App\Http\ViewModels\General\Languages\LanguageShowVM;
use App\Http\ViewModels\General\Languages\LanguageIndexVM;

class LanguageController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new LanguageIndexVM())->toArray()));
    }

    public function show(LanguageShowRequest $languageShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new LanguageShowVM($languageShowRequest->route('id')))->toArray()));
    }

    public function create(LanguageCreateRequest $languageCreateRequest){
        $data = $languageCreateRequest->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);
        
        $language = LanguageCreateAction::execute($languageDTO);

        $language = new LanguageShowVM($language->id);

        $response = Helpers::createSuccessResponse($language->toArray());

        return response()->json($response);
    }

    public function update(LanguageUpdateRequest $languageUpdateRequest){
        $data = $languageUpdateRequest->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);
        
        $language = LanguageUpdateAction::execute($languageDTO);

        $language = new LanguageShowVM($language->id);
        
        $response = Helpers::createSuccessResponse($language->toArray());

        return response()->json($response);
    }

    public function destroy(LanguageDestroyRequest $languageDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(LanguageDestroyAction::execute(LanguageDTO::fromRequest($languageDestroyRequest->validated()))));
    }

}

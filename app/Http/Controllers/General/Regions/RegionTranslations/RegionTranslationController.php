<?php


namespace App\Http\Controllers\General\Regions\RegionTranslations;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\RegionTranslations\Actions\RegionTranslationCreateAction;
use App\Domain\General\Regions\RegionTranslations\Actions\RegionTranslationDestroyAction;
use App\Domain\General\Regions\RegionTranslations\Actions\RegionTranslationUpdateAction;
use App\Domain\General\Regions\RegionTranslations\DTO\RegionTranslationDTO;
use App\Http\Requests\General\Regions\RegionTranslations\RegionTranslationCreateRequest;
use App\Http\Requests\General\Regions\RegionTranslations\RegionTranslationUpdateRequest;
use App\Http\Requests\General\Regions\RegionTranslations\RegionTranslationDestroyRequest;
use App\Http\Requests\General\Regions\RegionTranslations\RegionTranslationShowRequest;
use App\Http\ViewModels\General\Regions\RegionTranslations\RegionTranslationShowVM;
use App\Http\ViewModels\General\Regions\RegionTranslations\RegionTranslationIndexVM;

class RegionTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RegionTranslationIndexVM())->toArray()));
    }

    public function show(RegionTranslationShowRequest $regionTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new RegionTranslationShowVM($regionTranslationShowRequest->route('id')))->toArray()));
    }

    public function create(RegionTranslationCreateRequest $regionTranslationCreateRequest){
        $data = $regionTranslationCreateRequest->validated() ;

        $regionTranslationDTO = RegionTranslationDTO::fromRequest($data);
        
        $regionTranslation = RegionTranslationCreateAction::execute($regionTranslationDTO);

        $regionTranslation = new RegionTranslationShowVM($regionTranslation->id);

        $response = Helpers::createSuccessResponse($regionTranslation->toArray());

        return response()->json($response);
    }

    public function update(RegionTranslationUpdateRequest $regionTranslationUpdateRequest){
        $data = $regionTranslationUpdateRequest->validated() ;

        $regionTranslationDTO = RegionTranslationDTO::fromRequest($data);
        
        $regionTranslation = RegionTranslationUpdateAction::execute($regionTranslationDTO);

        $regionTranslation = new RegionTranslationShowVM($regionTranslation->id);
        
        $response = Helpers::createSuccessResponse($regionTranslation->toArray());

        return response()->json($response);
    }

    public function destroy(RegionTranslationDestroyRequest $regionTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RegionTranslationDestroyAction::execute(RegionTranslationDTO::fromRequest($regionTranslationDestroyRequest->validated()))));
    }

}

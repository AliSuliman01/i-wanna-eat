<?php


namespace App\Http\Controllers\General\Regions\RegionTypeTranslations;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\RegionTypeTranslations\Actions\RegionTypeTranslationCreateAction;
use App\Domain\General\Regions\RegionTypeTranslations\Actions\RegionTypeTranslationDestroyAction;
use App\Domain\General\Regions\RegionTypeTranslations\Actions\RegionTypeTranslationUpdateAction;
use App\Domain\General\Regions\RegionTypeTranslations\DTO\RegionTypeTranslationDTO;
use App\Http\Requests\General\Regions\RegionTypeTranslations\RegionTypeTranslationCreateRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslations\RegionTypeTranslationUpdateRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslations\RegionTypeTranslationDestroyRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslations\RegionTypeTranslationShowRequest;
use App\Http\ViewModels\General\Regions\RegionTypeTranslations\RegionTypeTranslationShowVM;
use App\Http\ViewModels\General\Regions\RegionTypeTranslations\RegionTypeTranslationIndexVM;

class RegionTypeTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RegionTypeTranslationIndexVM())->toArray()));
    }

    public function show(RegionTypeTranslationShowRequest $regionTypeTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new RegionTypeTranslationShowVM($regionTypeTranslationShowRequest->route('id')))->toArray()));
    }

    public function create(RegionTypeTranslationCreateRequest $regionTypeTranslationCreateRequest){
        $data = $regionTypeTranslationCreateRequest->validated() ;

        $regionTypeTranslationDTO = RegionTypeTranslationDTO::fromRequest($data);
        
        $regionTypeTranslation = RegionTypeTranslationCreateAction::execute($regionTypeTranslationDTO);

        $regionTypeTranslation = new RegionTypeTranslationShowVM($regionTypeTranslation->id);

        $response = Helpers::createSuccessResponse($regionTypeTranslation->toArray());

        return response()->json($response);
    }

    public function update(RegionTypeTranslationUpdateRequest $regionTypeTranslationUpdateRequest){
        $data = $regionTypeTranslationUpdateRequest->validated() ;

        $regionTypeTranslationDTO = RegionTypeTranslationDTO::fromRequest($data);
        
        $regionTypeTranslation = RegionTypeTranslationUpdateAction::execute($regionTypeTranslationDTO);

        $regionTypeTranslation = new RegionTypeTranslationShowVM($regionTypeTranslation->id);
        
        $response = Helpers::createSuccessResponse($regionTypeTranslation->toArray());

        return response()->json($response);
    }

    public function destroy(RegionTypeTranslationDestroyRequest $regionTypeTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RegionTypeTranslationDestroyAction::execute(RegionTypeTranslationDTO::fromRequest($regionTypeTranslationDestroyRequest->validated()))));
    }

}

<?php


namespace App\Http\Controllers\General\Regions\RegionTypeTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\RegionTypeTranslation\Actions\RegionTypeTranslationCreateAction;
use App\Domain\General\Regions\RegionTypeTranslation\Actions\RegionTypeTranslationDestroyAction;
use App\Domain\General\Regions\RegionTypeTranslation\Actions\RegionTypeTranslationUpdateAction;
use App\Domain\General\Regions\RegionTypeTranslation\DTO\RegionTypeTranslationDTO;
use App\Http\Requests\General\Regions\RegionTypeTranslation\RegionTypeTranslationCreateRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslation\RegionTypeTranslationUpdateRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslation\RegionTypeTranslationDestroyRequest;
use App\Http\Requests\General\Regions\RegionTypeTranslation\RegionTypeTranslationShowRequest;
use App\Http\ViewModels\General\Regions\RegionTypeTranslation\RegionTypeTranslationShowVM;
use App\Http\ViewModels\General\Regions\RegionTypeTranslation\RegionTypeTranslationIndexVM;

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

<?php


namespace App\Http\Controllers\General\Regions\RegionTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\RegionTranslation\Actions\RegionTranslationCreateAction;
use App\Domain\General\Regions\RegionTranslation\Actions\RegionTranslationDestroyAction;
use App\Domain\General\Regions\RegionTranslation\Actions\RegionTranslationUpdateAction;
use App\Domain\General\Regions\RegionTranslation\DTO\RegionTranslationDTO;
use App\Http\Requests\General\Regions\RegionTranslation\RegionTranslationCreateRequest;
use App\Http\Requests\General\Regions\RegionTranslation\RegionTranslationUpdateRequest;
use App\Http\Requests\General\Regions\RegionTranslation\RegionTranslationDestroyRequest;
use App\Http\Requests\General\Regions\RegionTranslation\RegionTranslationShowRequest;
use App\Http\ViewModels\General\Regions\RegionTranslation\RegionTranslationShowVM;
use App\Http\ViewModels\General\Regions\RegionTranslation\RegionTranslationIndexVM;

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

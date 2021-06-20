<?php


namespace App\Http\Controllers\General\Regions\RegionTypes;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\RegionTypes\Actions\RegionTypeCreateAction;
use App\Domain\General\Regions\RegionTypes\Actions\RegionTypeDestroyAction;
use App\Domain\General\Regions\RegionTypes\Actions\RegionTypeUpdateAction;
use App\Domain\General\Regions\RegionTypes\DTO\RegionTypeDTO;
use App\Http\Requests\General\Regions\RegionTypes\RegionTypeCreateRequest;
use App\Http\Requests\General\Regions\RegionTypes\RegionTypeUpdateRequest;
use App\Http\Requests\General\Regions\RegionTypes\RegionTypeDestroyRequest;
use App\Http\Requests\General\Regions\RegionTypes\RegionTypeShowRequest;
use App\Http\ViewModels\General\Regions\RegionTypes\RegionTypeShowVM;
use App\Http\ViewModels\General\Regions\RegionTypes\RegionTypeIndexVM;

class RegionTypeController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RegionTypeIndexVM())->toArray()));
    }

    public function show(RegionTypeShowRequest $regionTypeShowRequest){

        return response()->json(Helpers::createSuccessResponse((new RegionTypeShowVM($regionTypeShowRequest->route('id')))->toArray()));
    }

    public function create(RegionTypeCreateRequest $regionTypeCreateRequest){
        $data = $regionTypeCreateRequest->validated() ;

        $regionType = RegionTypeCreateAction::execute(RegionTypeDTO::fromRequest($data));

        foreach ($data['translations'] as $translation) {
            $regionType->translations()->attach($translation['language_id'],$translation);
        }

        return response()->json(Helpers::createSuccessResponse((new RegionTypeShowVM($regionType->id))->toArray()));
    }

    public function update(RegionTypeUpdateRequest $regionTypeUpdateRequest){
        $data = $regionTypeUpdateRequest->validated() ;

        $regionTypeDTO = RegionTypeDTO::fromRequest($data);

        $regionType = RegionTypeUpdateAction::execute($regionTypeDTO);
        foreach ($data['translations'] as $translation) {
            $regionType->translations()->updateExistingPivot($translation['language_id'],$translation);
        }
        $regionType = new RegionTypeShowVM($regionType->id);

        $response = Helpers::createSuccessResponse($regionType->toArray());

        return response()->json($response);
    }

    public function destroy(RegionTypeDestroyRequest $regionTypeDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RegionTypeDestroyAction::execute(RegionTypeDTO::fromRequest($regionTypeDestroyRequest->validated()))));
    }

}

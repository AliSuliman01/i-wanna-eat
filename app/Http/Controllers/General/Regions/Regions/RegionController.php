<?php


namespace App\Http\Controllers\General\Regions\Regions;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Regions\Regions\Actions\RegionCreateAction;
use App\Domain\General\Regions\Regions\Actions\RegionDestroyAction;
use App\Domain\General\Regions\Regions\Actions\RegionUpdateAction;
use App\Domain\General\Regions\Regions\DTO\RegionDTO;
use App\Http\Requests\General\Regions\Regions\RegionCreateRequest;
use App\Http\Requests\General\Regions\Regions\RegionUpdateRequest;
use App\Http\Requests\General\Regions\Regions\RegionDestroyRequest;
use App\Http\Requests\General\Regions\Regions\RegionShowRequest;
use App\Http\ViewModels\General\Regions\Regions\RegionShowVM;
use App\Http\ViewModels\General\Regions\Regions\RegionIndexVM;

class RegionController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RegionIndexVM())->toArray()));
    }

    public function show(RegionShowRequest $regionShowRequest){

        return response()->json(Helpers::createSuccessResponse((new RegionShowVM($regionShowRequest->route('id')))->toArray()));
    }

    public function create(RegionCreateRequest $regionCreateRequest){
        $data = $regionCreateRequest->validated() ;

        $regionDTO = RegionDTO::fromRequest($data);

        $region = RegionCreateAction::execute($regionDTO);

        foreach ($data['translations'] as $translation) {
            $region->translations()->attach($translation['language_id'],$translation);
        }

        $region = new RegionShowVM($region->id);

        $response = Helpers::createSuccessResponse($region->toArray());

        return response()->json($response);
    }

    public function update(RegionUpdateRequest $regionUpdateRequest){
        $data = $regionUpdateRequest->validated() ;

        $regionDTO = RegionDTO::fromRequest($data);

        $region = RegionUpdateAction::execute($regionDTO);

        $region = new RegionShowVM($region->id);

        $response = Helpers::createSuccessResponse($region->toArray());

        return response()->json($response);
    }

    public function destroy(RegionDestroyRequest $regionDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(RegionDestroyAction::execute(RegionDTO::fromRequest($regionDestroyRequest->validated()))));
    }

}

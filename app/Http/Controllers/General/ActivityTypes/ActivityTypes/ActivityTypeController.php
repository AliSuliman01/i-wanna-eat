<?php


namespace App\Http\Controllers\General\ActivityTypes\ActivityTypes;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\ActivityTypes\ActivityTypes\Actions\ActivityTypeCreateAction;
use App\Domain\General\ActivityTypes\ActivityTypes\Actions\ActivityTypeDestroyAction;
use App\Domain\General\ActivityTypes\ActivityTypes\Actions\ActivityTypeUpdateAction;
use App\Domain\General\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Http\Requests\General\ActivityTypes\ActivityTypes\ActivityTypeCreateRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypes\ActivityTypeUpdateRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypes\ActivityTypeDestroyRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypes\ActivityTypeShowRequest;
use App\Http\ViewModels\General\ActivityTypes\ActivityTypes\ActivityTypeShowVM;
use App\Http\ViewModels\General\ActivityTypes\ActivityTypes\ActivityTypeIndexVM;

class ActivityTypeController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeIndexVM())->toArray()));
    }

    public function show(ActivityTypeShowRequest $activityTypeShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM(['id' => $activityTypeShowRequest->route('id')]))->toArray()));
    }

    public function create(ActivityTypeCreateRequest $activityTypeCreateRequest){
        $data = $activityTypeCreateRequest->validated() ;

        $activityTypeDTO = ActivityTypeDTO::fromRequest($data);
        
        $activityType = ActivityTypeCreateAction::execute($activityTypeDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM($activityType->toArray()))->toArray()));
    }

    public function update(ActivityTypeUpdateRequest $activityTypeUpdateRequest){
        $data = $activityTypeUpdateRequest->validated() ;

        $activityTypeDTO = ActivityTypeDTO::fromRequest($data);
        
        $activityType = ActivityTypeUpdateAction::execute($activityTypeDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM($activityType->toArray()))->toArray()));
    }

    public function destroy(ActivityTypeDestroyRequest $activityTypeDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ActivityTypeDestroyAction::execute(ActivityTypeDTO::fromRequest($activityTypeDestroyRequest->validated()))));
    }

}

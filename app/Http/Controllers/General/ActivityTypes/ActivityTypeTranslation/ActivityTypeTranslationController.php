<?php


namespace App\Http\Controllers\General\ActivityTypes\ActivityTypeTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Actions\ActivityTypeTranslationCreateAction;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Actions\ActivityTypeTranslationDestroyAction;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Actions\ActivityTypeTranslationUpdateAction;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\DTO\ActivityTypeTranslationDTO;
use App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationCreateRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationUpdateRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationDestroyRequest;
use App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationShowRequest;
use App\Http\ViewModels\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationShowVM;
use App\Http\ViewModels\General\ActivityTypes\ActivityTypeTranslation\ActivityTypeTranslationIndexVM;

class ActivityTypeTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeTranslationIndexVM())->toArray()));
    }

    public function show(ActivityTypeTranslationShowRequest $activityTypeTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ActivityTypeTranslationShowVM(['id' => $activityTypeTranslationShowRequest->route('id')]))->toArray()));
    }

    public function create(ActivityTypeTranslationCreateRequest $activityTypeTranslationCreateRequest){
        $data = $activityTypeTranslationCreateRequest->validated() ;

        $activityTypeTranslationDTO = ActivityTypeTranslationDTO::fromRequest($data);
        
        $activityTypeTranslation = ActivityTypeTranslationCreateAction::execute($activityTypeTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeTranslationShowVM($activityTypeTranslation->toArray()))->toArray()));
    }

    public function update(ActivityTypeTranslationUpdateRequest $activityTypeTranslationUpdateRequest){
        $data = $activityTypeTranslationUpdateRequest->validated() ;

        $activityTypeTranslationDTO = ActivityTypeTranslationDTO::fromRequest($data);
        
        $activityTypeTranslation = ActivityTypeTranslationUpdateAction::execute($activityTypeTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeTranslationShowVM($activityTypeTranslation->toArray()))->toArray()));
    }

    public function destroy(ActivityTypeTranslationDestroyRequest $activityTypeTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ActivityTypeTranslationDestroyAction::execute(ActivityTypeTranslationDTO::fromRequest($activityTypeTranslationDestroyRequest->validated()))));
    }

}

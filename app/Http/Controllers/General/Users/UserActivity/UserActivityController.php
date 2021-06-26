<?php


namespace App\Http\Controllers\General\Users\UserActivity;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Users\UserActivity\Actions\UserActivityDestroyAction;
use App\Domain\General\Users\UserActivity\DTO\UserActivityDTO;
use App\Http\Requests\General\Users\UserActivity\UserActivityDestroyRequest;
use App\Http\Requests\General\Users\UserActivity\UserActivityShowRequest;
use App\Http\ViewModels\General\Users\UserActivity\UserActivityShowVM;
use App\Http\ViewModels\General\Users\UserActivity\UserActivityIndexVM;

class UserActivityController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new UserActivityIndexVM())->toArray()));
    }

    public function show(UserActivityShowRequest $userActivityShowRequest){

        return response()->json(Helpers::createSuccessResponse((new UserActivityShowVM(['id' => $userActivityShowRequest->route('id')]))->toArray()));
    }

    public function destroy(UserActivityDestroyRequest $userActivityDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(UserActivityDestroyAction::execute(UserActivityDTO::fromRequest($userActivityDestroyRequest->validated()))));
    }

}

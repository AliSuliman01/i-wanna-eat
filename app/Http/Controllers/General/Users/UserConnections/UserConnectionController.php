<?php


namespace App\Http\Controllers\General\Users\UserConnections;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Users\UserConnections\Actions\UserConnectionDestroyAction;
use App\Domain\General\Users\UserConnections\DTO\UserConnectionDTO;
use App\Http\Requests\General\Users\UserConnections\UserConnectionDestroyRequest;
use App\Http\Requests\General\Users\UserConnections\UserConnectionShowRequest;
use App\Http\ViewModels\General\Users\UserConnections\UserConnectionShowVM;
use App\Http\ViewModels\General\Users\UserConnections\UserConnectionIndexVM;

class UserConnectionController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new UserConnectionIndexVM())->toArray()));
    }

    public function show(UserConnectionShowRequest $userConnectionShowRequest){

        return response()->json(Helpers::createSuccessResponse((new UserConnectionShowVM(['id' => $userConnectionShowRequest->route('id')]))->toArray()));
    }

    public function destroy(UserConnectionDestroyRequest $userConnectionDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(UserConnectionDestroyAction::execute(UserConnectionDTO::fromRequest($userConnectionDestroyRequest->validated()))));
    }

}

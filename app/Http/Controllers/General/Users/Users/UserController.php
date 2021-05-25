<?php


namespace App\Http\Controllers\General\Users\Users;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\General\Users\Users\Actions\UserCreateAction;
use App\Domain\General\Users\Users\Actions\UserDestroyAction;
use App\Domain\General\Users\Users\Actions\UserUpdateAction;
use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Http\Requests\General\Users\Users\UserCreateRequest;
use App\Http\Requests\General\Users\Users\UserUpdateRequest;
use App\Http\Requests\General\Users\Users\UserDestroyRequest;
use App\Http\Requests\General\Users\Users\UserShowRequest;
use App\Http\ViewModels\General\Users\Users\UserShowVM;
use App\Http\ViewModels\General\Users\Users\UserIndexVM;


class UserController extends Controller
{

    public function index(){
        $class = "App\Http\ViewModels\General\Users\Users\UserIndexVM";

        return response()->json(Helpers::createSuccessResponse((new $class())->toArray()));
    }

    public function show(UserShowRequest $userShowRequest){

        return response()->json(Helpers::createSuccessResponse((new UserShowVM($userShowRequest->route('id')))->toArray()));
    }

    public function create(UserCreateRequest $userCreateRequest){
        $data = $userCreateRequest->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        $user = UserCreateAction::execute($userDTO);

        $user = new UserShowVM($user->id);

        $response = Helpers::createSuccessResponse($user->toArray());

        return response()->json($response);
    }

    public function update(UserUpdateRequest $userUpdateRequest){
        $data = $userUpdateRequest->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        $user = UserUpdateAction::execute($userDTO);

        $user = new UserShowVM($user->id);

        $response = Helpers::createSuccessResponse($user->toArray());

        return response()->json($response);
    }

    public function destroy(UserDestroyRequest $userDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(UserDestroyAction::execute(UserDTO::fromRequest($userDestroyRequest->validated()))));
    }

}

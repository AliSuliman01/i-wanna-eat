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
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUsersList",
     *      tags={"users"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */
    public function index(){
        $class = "App\Http\ViewModels\General\Users\Users\UserIndexVM";

        return response()->json(Helpers::createSuccessResponse((new $class())->toArray()));
    }
    /**
     * @OA\Get(
     *      path="/api/users/show/{id}",
     *      operationId="getUser",
     *      tags={"users"},
     *      summary="Get one user",
     *      description="Returns one user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */
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
    /**
     * @OA\Post(
     *      path="/api/users/update",
     *      operationId="UpdateUser",
     *      tags={"users"},
     *      summary="update user",
     *      description="update user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Update User
     */
    public function update(UserUpdateRequest $userUpdateRequest){
        $data = $userUpdateRequest->validated() ;

        $userDTO = UserDTO::fromRequest($data);

        $user = UserUpdateAction::execute($userDTO);

        $user = new UserShowVM($user->id);

        $response = Helpers::createSuccessResponse($user->toArray());

        return response()->json($response);
    }
    /**
     * @OA\Post(
     *      path="/api/users/destroy",
     *      operationId="DestroyUser",
     *      tags={"users"},
     *      summary="destroy user",
     *      description="destroy user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Destroy User
     */
    public function destroy(UserDestroyRequest $userDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(UserDestroyAction::execute(UserDTO::fromRequest($userDestroyRequest->validated()))));
    }

}

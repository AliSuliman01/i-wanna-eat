<?php


namespace App\Http\Controllers\General\Users\Auth;


use App\Domain\General\Users\Auth\Actions\LoginAction;
use App\Domain\General\Users\Auth\Actions\SignupAction;
use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Users\Auth\LoginRequest;
use App\Http\Requests\General\Users\Auth\SignupRequest;

class AuthController extends Controller
{

    public function login(LoginRequest $loginRequest){
        $userDTO = UserDTO::fromRequest($loginRequest->validated());
        return response()->json(Helpers::createSuccessResponse(LoginAction::execute($userDTO)));
    }
    /**
     * @OA\Post(
     *      path="/api/auth/signup",
     *      operationId="SignupUser",
     *      tags={"auth"},
     *      summary="Signup using email and password",
     *      description="fill all feilds for better experience ",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *     required={"email","password"},
     *     @OA\Property(property="username",type="string",format="email",example="user@example.com"),
     *     @OA\Property(property="email",type="string",format="email",example="user@example.com"),
     *     @OA\Property(property="password",type="string",format="password",example="PassWord12345"),
     *     @OA\Property(property="mobile_number",type="string"),
     *     )
     *     ),
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
    public function signup(SignupRequest $signupRequest){
        $userDTO = UserDTO::fromRequest($signupRequest->validated());
        return response()->json(Helpers::createSuccessResponse(SignupAction::execute($userDTO)));
    }
}

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

    public function login(LoginRequest $loginRequest)
    {
        $userDTO = UserDTO::fromRequest($loginRequest->validated());
        return response()->json(Helpers::createSuccessResponse(LoginAction::execute($userDTO)));
    }

    /**
     * @OA\Post(
     *      path="/api/auth/signup",
     *      operationId="SignupUser",
     *      tags={"auth"},
     *      summary="Signup using email and password",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *     required={"email","password"},
     *     @OA\Property(property="username",type="string",example="john lay"),
     *     @OA\Property(property="email",type="string",format="email",example="user@example.com"),
     *     @OA\Property(property="password",type="string",format="password",example="PassWord12345"),
     *     @OA\Property(property="mobile_number",type="string", example="0987654321"),
     *     )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="successful",
     *     @OA\JsonContent(
     *          @OA\Property (property="isSuccessful",type="boolean",example="true"),
     *          @OA\Property (property="hasContent",type="boolean",example="true"),
     *          @OA\Property (property="code",type="integer",example="200"),
     *          @OA\Property (property="message",type="string",example=""),
     *          @OA\Property (property="data" ,type="object", ref="#/components/schemas/User")
     *       )
     * ),
     *       @OA\Response(
     *          response=400,
     *          description="validation error",
     *          @OA\JsonContent(
     *          @OA\Property (property="isSuccessful",type="boolean",example="false"),
     *          @OA\Property (property="hasContent",type="boolean",example="false"),
     *          @OA\Property (property="code",type="integer",example="400"),
     *          @OA\Property (property="message",type="string",example="The email has already been taken."),
     *          @OA\Property (property="data" ,type="object", example="null")
     *          )
     *      )
     *     )
     *
     * Returns list of projects
     */
    public function signup(SignupRequest $signupRequest)
    {
        $userDTO = UserDTO::fromRequest($signupRequest->validated());
        return response()->json(Helpers::createSuccessResponse(SignupAction::execute($userDTO)));
    }
}

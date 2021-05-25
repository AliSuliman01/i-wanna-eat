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
    public function signup(SignupRequest $signupRequest){
        $userDTO = UserDTO::fromRequest($signupRequest->validated());
        return response()->json(Helpers::createSuccessResponse(SignupAction::execute($userDTO)));
    }
}

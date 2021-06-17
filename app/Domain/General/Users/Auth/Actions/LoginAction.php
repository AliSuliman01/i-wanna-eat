<?php


namespace App\Domain\General\Users\Auth\Actions;


use App\Domain\General\Users\Users\DTO\UserDTO;
use App\Domain\General\Users\Users\Model\User;
use App\Exceptions\CustomException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    /**
     * @param UserDTO $userDTO
     * @throws CustomException
     */
    public static function execute(UserDTO $userDTO){
         $user = $userDTO->email ? User::where('email',$userDTO->email)->first():(
                 $userDTO->username ? User::where('username',$userDTO->username)->first():(
                 $userDTO->mobile_number ? User::where('mobile_number',$userDTO->mobile_number):null)->first()) ;

        if($user){
            if(Hash::check($userDTO->password,$user->password)){
                $tokenObj = $user->createToken('UserToken',[$user->getRole()]);
                $tokenObj->token->expires_at->diffInSeconds(Carbon::now());
                return $user->toArray() + [
                    'token' => $tokenObj->accessToken
                    ];
            }else{
                throw new CustomException('this password is invalid!',[],400);
            }
        }
    }
}

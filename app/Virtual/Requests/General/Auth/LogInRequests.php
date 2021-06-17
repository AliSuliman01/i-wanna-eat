<?php
namespace App\Virtual\Requests\General\Auth;


/**
 * @OA\Schema (
 *     title = "using email",
 *      required={"email","password"},
 *      @OA\Xml(name="EmailLogInRequest"),
 *     @OA\Property(property="email",type="string",format="email",example="user@example.com"),
 *     @OA\Property(property="password",type="string",format="password",example="PassWord12345"),
 *     )
 * Class EmailLogInRequest
 * */
class EmailLogInRequest
{

}
/**
 * @OA\Schema (
 *     title = "using username",
 *     required={"username","password"},
 *      @OA\Xml(name="UsernameLogInRequest"),
 *     @OA\Property(property="username",type="string",example="john lay"),
 *     @OA\Property(property="password",type="string",format="password",example="PassWord12345"),)
 * Class UsernameLogInRequest
 * */
class UsernameLogInRequest
{

}
/**
 * @OA\Schema (
 *     title = "using mobile number",
 *     required={"mobile_number","password"},
 *      @OA\Xml(name="MobileNumberLogInRequest"),
 *     @OA\Property(property="mobile_number",type="string", example="0987654321"),
 *     @OA\Property(property="password",type="string",format="password",example="PassWord12345")
 * )
 * Class MobileNumberLogInRequest
 * */
class MobileNumberLogInRequest
{

}

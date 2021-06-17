<?php
/**
 * @OA\Schema (
 *     title="object",
 *     schema="User",
 *     required = {"email","password"},
 *     @OA\Xml(name="User"),
 *     @OA\Property (property="id" ,type="integer", example="1"),
 *     @OA\Property (property="username" ,type="string", example="username"),
 *     @OA\Property (property="email", type="string", format="email", example="user@test.com"),
 *     @OA\Property (property="email_verified_at", type="string" ,format="date-time", example="2020-3-25 20:30:50"),
 *     @OA\Property (property="user_photo", type="string", example="/storage/users/photos/username_1249382727.jpg"),
 *     @OA\Property (property="mobile_number", type="string", example="0987654321"),
 *     @OA\Property (property="password_reset_at", type="string", format="date-time", example="2020-3-25 20:30:50"),
 *     @OA\Property (property="language_id", type="integer" ,example="1"),
 *     @OA\Property (property="role_id", type="integer", example="1"),
 * )
 * */

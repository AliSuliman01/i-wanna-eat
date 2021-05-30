<?php

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Wanna Eat API",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="alisulimanq@gmail.com"
 *      )
 * )
 */


/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 */

/**
 * @OA\OpenApi(
 *   security={
 *     {
 *       "oauth2": {"read:oauth2"},
 *     }
 *   }
 * )
 */

/**
 * @OA\ExternalDocumentation(
 *     description="Find out more about Swagger",
 *     url="http://swagger.io"
 * )
 */

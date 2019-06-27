<?php

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *      title="Swagger API Documentation",
 *      version="1.0.0",
 *      @OA\Contact(
 *          email="tekwie.david@gmail.com"
 *      ),
 *      @OA\License(
 *          name="nginx",
 *          url="https://www.nginx.com/"
 *      )
 * )
 * @OA\Tag(
 *      name="Pets",
 *      description="All Pets"
 *
 * )
 * @OA\Server(
 *      description="Swagger API Server",
 *      url="http://localhost:8080/api"
 * )
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      in="header",
 *      name="X-APP-ID",
 *      securityScheme="X-APP-ID"
 * )
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      in="header",
 *      name="X-APP-KEY",
 *      securityScheme="X-APP-KEY"
 * )
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      in="header",
 *      name="X-API-TOKEN",
 *      securityScheme="X-API-TOKEN"
 * )
 */

class ApiController extends Controller
{
    //
}
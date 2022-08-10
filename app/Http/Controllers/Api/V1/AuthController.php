<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ErrorResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }
    /**
     * @OA\Info(title="HT-Codethon API", version="0.1")

    * @OA\Schemes(format="http")
    * @OA\SecurityScheme(
    *      securityScheme="bearerAuth",
    *      in="header",
    *      name="Authorization",
    *      type="http",
    *      scheme="Bearer",
    *      bearerFormat="JWT",
    * ),
    */



    /**
     * @OA\POST(path="/api/v1/login",
     *   tags={"user"},
     *   summary="Logs user into the system",
     *   description="",
     *   operationId="loginUser",
     *   @OA\Parameter(
     *     name="email",
     *     required=true,
     *     in="query",
     *     description="The email address for login",
     *     @OA\Schema(
     *         type="string",
     *         default="admin@hindustantimes.com"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *         type="string",
     *         default="123456"
     *     ),
     *     description="The password for login in clear text",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *     @OA\Header(
     *       header="X-Rate-Limit",
     *       @OA\Schema(
     *           type="integer",
     *           format="int32"
     *       ),
     *       description="calls per hour allowed by the user"
     *     ),
     *     @OA\Header(
     *       header="X-Expires-After",
     *       @OA\Schema(
     *          type="string",
     *          format="date-time",
     *       ),
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @OA\Response(response=400, description="Invalid username/password supplied")
     * )
     */

    /**
     * Get a JWT via given credentials.
     *
     * @return CommonResource|ErrorResource
     */
    public function login()
    {
        try {
                $credentials = request(['login', 'password']);

                if ($token = auth()->attempt($credentials)) {
                    return $token;
                } else {
                    return 'error';
                }

            // if (!$token = auth()->attempt($credentials)) {
            //     return new ErrorResource(['message' => trans('message.UsernamePasswordDoesNotMatch'), 'statusCode' => 401]);
            // }

            // if(auth()->user()->status == 'inactive'){
            //     return new CommonResource(trans('message.AccountDisable'));
            // }

            // if(!auth()->user()->is_phone_verified || !auth()->user()->is_email_verified){
            //     return new CommonResource(trans('message.VerifyEmailPassword'));
            // }

            return new CommonResource(['data' => ['user' => auth()->user(), 'token' => $token]]);

        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

    /**
     * @OA\Get(path="/api/v1/user-detail",
     *   tags={"user"},
     *   summary="Get logged in user",
     *   description="",
     *   security={{"bearerAuth":{}}},
     *   operationId="loggedInUser",
     *   @OA\Response(response=200, description="successful operation", @OA\Schema(ref="#/components/schemas/User")),
     *   @OA\Response(response=400, description="Invalid username supplied"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="User not found")
     * )
     */

    /**
     * Get the authenticated User.
     *
     * @return CommonResource|ErrorResource
     */

    public function userDetail()
    {
        try {
            return new CommonResource(User::with('student')->findOrFail(auth()->id()));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }

      /**
     * @OA\PUT(path="/api/v1/update-user",
     *   tags={"user"},
     *   summary="update user detail",
     *   description="",
     *   operationId="UpdateUser",
     *   security={{"bearerAuth":{}}},
     * @OA\Parameter(
     *     name="name",
     *     in="query",
     *     description="Enter Name",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     * @OA\Parameter(
     *     name="phone",
     *     in="query",
     *     description="Enter Phone no.",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     * @OA\Parameter(
     *     name="image",
     *     required=true,
     *     in="query",
     *     description="Upload Image",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="Update Email Address",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     in="query",
     *     @OA\Schema(
     *         type="string",
     *     ),
     *     description="Update password",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *     @OA\Header(
     *       header="X-Rate-Limit",
     *       @OA\Schema(
     *           type="integer",
     *           format="int32"
     *       ),
     *       description="calls per hour allowed by the user"
     *     ),
     *     @OA\Header(
     *       header="X-Expires-After",
     *       @OA\Schema(
     *          type="string",
     *          format="date-time",
     *       ),
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @OA\Response(response=400, description="Invalid supplied")
     * )
     */

    /**
     * Update the specified resource in DB.
     *
     * @param UpdateUserRequest $request
     * @return CommonResource|ErrorResource
     */
    public function updateUser(UpdateUserRequest $request)
    {
        return $this->userRepo->updateUser(auth()->id());
    }

    /**
     * @OA\Get(path="/api/v1/logout",
     *   tags={"user"},
     *   summary="Logs out current logged in user session",
     *   description="",
     *   operationId="logoutUser",
     *   security={{"bearerAuth":{}}},
     *   parameters={},
     *   @OA\Response(response="default", description="successful operation")
     * )
     */

    /**
     * Log the user out (Invalidate the token).
     *
     * @return CommonResource|ErrorResource
     */
    public function logout()
    {
        try {
            auth()->logout();
            return new CommonResource(trans('message.LogoutSuccessfully'));
        } catch (Exception $e) {
            return new ErrorResource($e->getMessage());
        }
    }
}

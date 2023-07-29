<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginValidator;
use App\Services\LoginService;
use App\Traits\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;
  
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(loginValidator $request)
    {
        
        try {
            $credentials = $request->only(['email', 'password']);
            $auth = $this->loginService->execute($credentials);
            return $this->successResponse($auth);
        } catch (\Throwable $th) {  
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {   
        try {
            return $this->successResponse(auth()->user());

        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {   
        try {
            auth()->logout();
            return $this->successResponse((['message' => 'Successfully logged out']));

        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }

    }

}
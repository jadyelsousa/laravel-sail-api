<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserValidator;
use App\Repositories\Contracts\UserRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Traits\ApiResponseTrait;

class UserController extends Controller
{
    use ApiResponseTrait;

    protected $model;

    public function __construct(UserRepositoryInterface $model) {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {
        $users = $this->model->all();
        return $this->successResponse($users);
       } catch (\Throwable $th) {
        return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = $this->model->show($id);
            return $this->successResponse($user);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserValidator $request)
    {
       try {
        $user = $this->model->store($request->all());
        $token = JWTAuth::fromUser($user);
        $user->access_token = $token;
        $user->token_type = 'bearer';
        $user->expires_in = auth()->factory()->getTTL() * 60;
        
        return $this->successResponse($user);
       } catch (\Throwable $th) {
        return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserValidator $request, $id)
    {
        try {
            $user = $this->model->update($request->all(), $id);
            return $this->successResponse($user);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->model->destroy($id);
            return $this->successResponse($user);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }
}

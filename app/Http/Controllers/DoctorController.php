<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDoctorValidator;
use App\Http\Requests\CreateUserValidator;
use App\Repositories\Contracts\DoctorRepositoryInterface;
use App\Traits\ApiResponseTrait;

class DoctorController extends Controller
{
    use ApiResponseTrait;

    protected $model;

    public function __construct(DoctorRepositoryInterface $model) {
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
        $doctors = $this->model->all();
        return $this->successResponse($doctors);
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
    public function showByCity($id)
    {
        try {
            $doctor = $this->model->showByCity($id);
            return $this->successResponse($doctor);
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
    public function store(CreateDoctorValidator $request)
    {
       try {
        $user = $this->model->store($request->all());
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

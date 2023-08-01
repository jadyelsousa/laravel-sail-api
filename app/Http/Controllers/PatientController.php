<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientValidator;
use App\Repositories\Contracts\PatientRepositoryInterface;
use App\Traits\ApiResponseTrait;

class PatientController extends Controller
{
    use ApiResponseTrait;

    protected $model;

    public function __construct(PatientRepositoryInterface $model) {
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
        $patients = $this->model->all();
        return $this->successResponse($patients);
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
    public function store(CreatePatientValidator $request)
    {
       try {
        $patient = $this->model->store($request->all());
        return $this->successResponse($patient);
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
    public function update(createPatientValidator $request, $id_paciente)
    {
        try {
            $patient = $this->model->update($request->all(), $id_paciente);
            return $this->successResponse($patient);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }
}

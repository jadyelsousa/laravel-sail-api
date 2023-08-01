<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDoctorValidator;
use App\Http\Requests\linkDoctorWithPatientValidator;
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
    public function getDoctorsByCity($id_cidade)
    {
        try {
            $doctor = $this->model->getDoctorsByCity($id_cidade);
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
        $doctor = $this->model->store($request->all());
        return $this->successResponse($doctor);
       } catch (\Throwable $th) {
        return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
       }
    }

    /**
     * Display the pacientes for the specified doctor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPatientsByDoctor($id_medico)
    {
        try {
            $doctorPatients = $this->model->getPatientsByDoctor($id_medico);
            return $this->successResponse($doctorPatients);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }

    /**
     * link the doctor with the patient.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function linkDoctorWithPatient(linkDoctorWithPatientValidator $request, $id_medico)
    {   
        try {
            $doctor = $this->model->linkDoctorWithPatient($request->all(), $id_medico);
            return $this->successResponse($doctor);
        } catch (\Throwable $th) {
            return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
        }
    }
}
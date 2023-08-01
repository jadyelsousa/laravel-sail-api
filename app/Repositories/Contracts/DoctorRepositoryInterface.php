<?php

namespace App\Repositories\Contracts;

interface DoctorRepositoryInterface
{
    public function all();
    public function getDoctorsByCity($id);  
    public function store($data);  
    public function getPatientsByDoctor($id_medico);
    public function linkDoctorWithPatient($request, $id_medico);  
}
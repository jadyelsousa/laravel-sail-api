<?php

namespace App\Repositories\Contracts;

interface PatientRepositoryInterface
{
    public function all();  
    public function store($data);  
    public function update($data, $id);  
}
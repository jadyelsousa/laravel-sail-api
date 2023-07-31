<?php

namespace App\Repositories\Contracts;

interface DoctorRepositoryInterface
{
    public function all();
    public function showByCity($id);  
    public function store($data);  
    public function update($data, $id);  
    public function destroy($id);  
}
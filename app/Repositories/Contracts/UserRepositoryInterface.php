<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function all();
    public function show($id);  
    public function store($data);  
    public function update($data, $id);  
    public function destroy($id); 
    public function findByCredentials($credentials);  
}
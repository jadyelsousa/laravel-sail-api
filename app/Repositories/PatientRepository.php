<?php 

namespace App\Repositories;

use App\Models\Paciente;
use App\Repositories\Contracts\PatientRepositoryInterface;

class PatientRepository extends AbstractRepository implements PatientRepositoryInterface
{   
  protected $model = Paciente::class; 
}
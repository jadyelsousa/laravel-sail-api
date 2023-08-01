<?php 

namespace App\Repositories;

use App\Models\Medico;
use App\Models\Paciente;
use App\Repositories\Contracts\DoctorRepositoryInterface;

class DoctorRepository extends AbstractRepository implements DoctorRepositoryInterface
{   
  protected $model = Medico::class;
  
  public function getDoctorsByCity($id_cidade)
  {
    return $this->model->where('cidade_id', $id_cidade)->with('cidade')->get();
  }

  public function linkDoctorWithPatient($request, $id_medico)
  {
    $model = $this->model->find($id_medico);
    $model->pacientes()->sync([$request['paciente_id']], false);
    return $model->with('pacientes')->first();
  }

  public function getPatientsByDoctor($id_medico)
  {
    return $this->model->with('pacientes')->find($id_medico)->pacientes;
  }
}
<?php 

namespace App\Repositories;

use App\Models\Medico;
use App\Repositories\Contracts\DoctorRepositoryInterface;

class DoctorRepository extends AbstractRepository implements DoctorRepositoryInterface
{   
  protected $model = Medico::class;
  
  public function showByCity($id)
  {
    return $this->model->where('cidade_id', $id)->with('cidade')->get();
  }
}
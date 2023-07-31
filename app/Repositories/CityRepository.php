<?php 

namespace App\Repositories;

use App\Models\Cidade;
use App\Repositories\Contracts\CityRepositoryInterface;

class CityRepository extends AbstractRepository implements CityRepositoryInterface
{   
    protected $model = Cidade::class;
}
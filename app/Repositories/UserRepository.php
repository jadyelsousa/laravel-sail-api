<?php 

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{   
    protected $model = User::class;

    public function findByCredentials($credentials)
    {
      return $this->model->where(['email' => $credentials['email'], 'password' => Hash::check($credentials['password'], $this->model->getAuthPassword()) ])->first(['id','name','email']);
    }
    
   
}
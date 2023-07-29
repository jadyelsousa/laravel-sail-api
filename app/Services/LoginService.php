<?php 

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class LoginService 
{   

    protected $user;

    public function __construct(UserRepositoryInterface $user) {
        $this->user = $user;
    }
    public function execute($credentials)
    {
        $token = auth()->attempt($credentials);
        if ($token) {

            $user = $this->user->findByCredentials($credentials);
            return $this->respondWithToken($token, $user);
        }

        throw new \Exception('Invalid Credentials');
    }

    protected function respondWithToken($token, $user)
    {
        return [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
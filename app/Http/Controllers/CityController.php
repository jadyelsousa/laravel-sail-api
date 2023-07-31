<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Traits\ApiResponseTrait;

class CityController extends Controller
{
    use ApiResponseTrait;

    protected $model;

    public function __construct(CityRepositoryInterface $model) {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {
        $cities = $this->model->all();
        return $this->successResponse($cities);
       } catch (\Throwable $th) {
        return $this->errorResponse('Unauthorized', $th->getMessage(), 401);
       }
    }
}

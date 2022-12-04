<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\StoreRequest;
use App\Models\Bank\Bank;
use App\Models\Bank\BankRepository;

class BankController extends Controller
{

    protected $model;
    protected $repo;

    public function __construct(Bank $model, BankRepository $repo)
    {
        $this->model = $model;
        $this->repo  = $repo;
    }

    public function store(StoreRequest $request)
    {
        dd($request);
        $data = $request->validated();
        dd($data);
        // return $this->repo->create($data);
    }

}

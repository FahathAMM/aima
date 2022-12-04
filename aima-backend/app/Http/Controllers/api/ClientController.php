<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Bank\Bank;
use App\Models\Client\Client;
use App\Models\client\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;
    protected $repo;

    public function __construct(Client $model, ClientRepository $repo)
    {
        $this->model = $model;
        $this->repo  = $repo;
    }

    public function index(Request $request)
    {
        return $this->model
            ->with('bank')
            ->paginate($request->per_page ?? $this->model::PER_PAGE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreRequest $request)
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('profile')) {
            $path            = FilesController::imageUpload($request->file('profile'), 'images/profile', 'public');
            $data['profile'] = $path;
        };

        $created = $this->repo->create($data);

        if ($created) {
            Bank::create($request->BankData($created));
        }

        return $this->repo->returnToApi($created, 'Client succusully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('profile')) {
            $path            = FilesController::imageUpload($request->file('profile'), 'images/profile', 'public');
            $data['profile'] = $path;
        };
        $data;
        $updated = $this->repo->update($data, $client);

        if ($updated) {
            Bank::create($request->BankData($updated));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return $this->repo->delete($client);
    }
}

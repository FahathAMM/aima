<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseRepository;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    protected $model;
    protected $repo;

    public function __construct(Purchase $model, PurchaseRepository $repo)
    {
        $this->model = $model;
        $this->repo  = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = $this->repo->insertMultiArray($request->all());

        if ($created) {
            return $this->repo->returnToApi($created, 'Purchse succusully created');
        }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPurchaseListByClient($id)
    {
        return $this->model
            ->whereClientId($id)
            ->get();
    }

    public function getTotalCount($id)
    {
        $model           = $this->model->whereClientId($id);
        $purchase_amount = $model->clone()->sum('purchase_amount');
        $selling_amount  = $model->clone()->sum('selling_amount');
        return [
            [
                'title'  => 'Total Purchase',
                'amount' => $purchase_amount,
            ],
            [
                'title'  => 'Total Selling',
                'amount' => $selling_amount,
            ],
            [
                'title'  => 'Total Profit',
                'amount' => $selling_amount - $purchase_amount,
            ],
        ];

    }
}

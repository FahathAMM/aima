<?php

namespace App\Models;

use App\Models\baseinterface\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{

    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getColunms($colunms, $paginate = false, $perPage = 10)
    {
        $model = $this->model->select($colunms);
        if (isset($paginate)) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public function getWithPaginate($perPage = null)
    {
        $items = $this->model->query();

        if (!is_null($perPage)) {
            return $items->paginate($perPage)->withQueryString();
        } else {
            return $items->get();
        }
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail();
    }

    // public function create($collection)
    // {
    //     try {

    //         $res      = $this->model->create($collection);
    //         $response = [
    //             'status'  => true,
    //             'record'  => $res,
    //             'message' => $this->model($this->model) . ' succussfully created',
    //         ];
    //         if ($res) {
    //             return response()->json($response, 200);
    //         } else {
    //             return response()->json([
    //                 'status'  => false,
    //                 'record'  => null,
    //                 'message' => $this->model($this->model) . ' cannot create',
    //             ], 200);
    //         }
    //     } catch (\Throwable$th) {
    //         throw $th;
    //     }
    // }

    public function create($collection)
    {
        try {
            return $this->model->create($collection);
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function insertMultiArray($collection)
    {
        try {
            foreach ($collection as $c) {
                $this->model->create($c);
            }
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function insert($collection)
    {
        try {
            return $this->model->insert($collection);
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function returnToApi($data, $message)
    {
        try {
            $response = [
                'status'  => true,
                'record'  => $data,
                'message' => $message,
            ];
            if ($data) {
                return response()->json($response, 200);
            } else {
                return response()->json([
                    'status'  => false,
                    'record'  => null,
                    'message' => 'something error',
                ], 200);
            }
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function update($collection, $model)
    {
        try {
            return $model->update($collection);
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $isObj = gettype($id) == 'object' ? true : false;

            if ($isObj) {
                $m = $id;
            } else {
                $m = $this->model->whereId($id);
            }

            $res = $m->delete();

            $response = [
                'status'  => true,
                'message' => $this->model($this->model) . ' succussfully deleted',
            ];

            if ($res) {
                return response()->json($response, 200);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => $this->model($this->model) . ' cannot delete',
                ], 200);
            }
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function model($m)
    {
        return class_basename($m);
    }

}

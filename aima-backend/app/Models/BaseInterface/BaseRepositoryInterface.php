<?php

namespace App\Models\BaseInterface;

interface BaseRepositoryInterface
{
    public function getAll();

    public function getColunms($colunms, $paginate = false, $perPage = 10);

    public function findOrFail($id);

    public function getWithPaginate($perPage);

    public function insertMultiArray($collection);

    // public function createWithAlertMessage($collection, $alertMessage);

    // public function updateWithAlertMessage($collection, $alertMessage, $attribute);
}

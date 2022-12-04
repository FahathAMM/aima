<?php

namespace App\Models\client;

use App\Models\BaseRepository;
use App\Models\product\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    public $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}

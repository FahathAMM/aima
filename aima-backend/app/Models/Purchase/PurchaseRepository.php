<?php

namespace App\Models\Purchase;

use App\Models\BaseRepository;
use App\Models\Purchase\Purchase;

class PurchaseRepository extends BaseRepository
{
    public function __construct(Purchase $model)
    {
        parent::__construct($model);
    }
}

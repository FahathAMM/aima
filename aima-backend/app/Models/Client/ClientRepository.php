<?php

namespace App\Models\client;

use App\Models\BaseRepository;
use App\Models\client\Client;

class ClientRepository extends BaseRepository
{

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
}

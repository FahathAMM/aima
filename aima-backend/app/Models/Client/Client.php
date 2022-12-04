<?php

namespace App\Models\client;

use App\Models\Bank\Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const PER_PAGE     = 200;
    protected $guarded = [];

    public function getProfileAttribute($key)
    {
        if ($key) {
            return asset('storage/' . $key);
        }
    }

    /**
     * Get the bank that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

}

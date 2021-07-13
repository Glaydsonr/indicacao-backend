<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'indication_statuses';

    /**
     * @return hasMany
     */
    public function status(): hasMany
    {
        return $this->hasMany(Indication::class);
    }

}

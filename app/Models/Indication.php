<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Indication extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf', 'phone', 'localization', 'email', 'status_id'];
    /**
     * @return hasOne
     */
    public function status(): hasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}

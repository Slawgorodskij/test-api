<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'status',
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}

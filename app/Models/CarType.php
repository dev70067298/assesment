<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarModel;

class CarType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carModel()
    {
    	return $this->hasMany(CarModel::class);
    }
}

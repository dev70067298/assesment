<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarType;
use App\Models\CarDelivery;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carType()
    {
    	return $this->belongsTo(CarType::class);
    }

    public function carDeliveries()
    {
    	return $this->hasMany(CarDelivery::class);
    }
}

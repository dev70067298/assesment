<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarDelivery;
use App\Models\State;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carDeliveries()
    {
    	return $this->hasMany(CarDelivery::class);
    }

    public function states()
    {
        return $this->belongsTo(State::class);
    }
}

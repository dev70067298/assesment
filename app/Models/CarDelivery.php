<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarModel;
use App\Models\Customer;
use App\Models\State;

class CarDelivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function carModels()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}

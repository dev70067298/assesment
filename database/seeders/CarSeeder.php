<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\{CarType, CarModel};

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("cars.json");
        $cars = json_decode($json);

        foreach ($cars as $key => $value) {
            $type = CarType::create([
                "title" => $value->title,
                "value" => $value->value,
            ]);

            if(is_array($value->models) && count($value->models)){
                foreach ($value->models as $key => $model) {
                CarModel::create([
                    "car_type_id" => $type->id,
                    "title" => $model->title,
                    "value" => $model->value,
                ]);
                }
            }
        }
    }
}

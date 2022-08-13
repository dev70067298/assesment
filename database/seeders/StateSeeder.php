<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use File;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("states.json");
        $states = json_decode($json);

        foreach ($states as $key => $value) {
            state::create([
                "name" => $value->name,
                "code" => $value->code,
                "capital" => $value->capital,
                "year" => $value->year,
            ]);
        }
    }
}

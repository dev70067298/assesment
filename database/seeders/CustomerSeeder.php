<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use File;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen("users.txt", "r");

        while(! feof($file))
        {
            Customer::create([
            "name" => fgets($file),
            ]);
        }

        fclose($file);
    }
}

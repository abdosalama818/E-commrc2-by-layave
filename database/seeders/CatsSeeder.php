<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Seeder;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::create([
            'name'=>'PC'
        ]);
        Cat::create([
            'name'=>'Moblie'
        ]);

        Cat::create([
            'name'=>'LAPTOB'
        ]);
    }
}

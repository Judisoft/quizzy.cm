<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = ['form one', 'form two', 'form three', 'form four', 'form five', 'lower sixth', 'upper sixth'];

        for($i = 0; $i < count($levels); $i++)
        {
            \App\Models\Level::insert([
                'name' => $levels[$i],
                'class_id' => $i + 1
            ]);
        }
    }
}

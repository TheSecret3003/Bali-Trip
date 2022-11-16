<?php

namespace Database\Seeders;
use App\Models\Day;

use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $day = [
            [
                'id' => 1,
            ],
            [
                'id' => 2,
            ],
            [
                'id' => 3,
            ],
            [
                'id' => 4,
            ],
            [
                'id' => 5,
            ],
            [
                'id' => 6,
            ],
            [
                'id' => 7,
            ],
            [
                'id' => 8,
            ],
        ];
  
        foreach ($day as $key => $value) {
            Day::firstOrCreate($value);
        }
    }
}

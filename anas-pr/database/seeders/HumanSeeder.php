<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Human;

class HumanSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $i) {
            Human::create(['fullname' => "Human $i"]);
        }
    }
}

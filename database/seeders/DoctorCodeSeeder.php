<?php

namespace Database\Seeders;

use App\Models\DoctorCode;
use Database\Factories\DoctorCodeFactory;
use Illuminate\Database\Seeder;

class DoctorCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorCode::factory()->count(100)->create();
    }
}

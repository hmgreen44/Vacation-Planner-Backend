<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTrip;

class UserTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       UserTrip::factory()->count(25)->create();
    }
}

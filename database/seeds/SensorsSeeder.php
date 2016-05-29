<?php

use App\Sensor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->delete();

        factory(Sensor::class)->create([ 'type' => 'led' ]);
        factory(Sensor::class)->create([ 'type' => 'button' ]);
        factory(Sensor::class)->create([ 'type' => 'door' ]);
    }
}

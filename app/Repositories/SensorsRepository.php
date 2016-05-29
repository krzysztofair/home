<?php

namespace App\Repositories;

use App\Sensor;

class SensorsRepository
{
    public function all()
    {
        return Sensor::all();
    }
}

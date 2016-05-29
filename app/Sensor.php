<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [ 'type', 'state' ];

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

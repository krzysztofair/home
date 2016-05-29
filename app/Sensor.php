<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [ 'type', 'state' ];

    public function getStateAttribute($value)
    {
        return json_decode($value, true);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

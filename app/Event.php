<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [ 'type', 'sensor_id' ];

    public function actions()
    {
        return $this->belongsToMany(Action::class)->withTimestamps();
    }
}

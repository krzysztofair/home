<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [ 'sensor_id', 'command' ];

    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
}

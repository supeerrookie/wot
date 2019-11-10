<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineups extends Model
{
    //

   	public function mediaList()
    {
        return $this->hasMany(Media::class, 'id_lineups');
    }

    public function scheduleList()
    {
        return $this->hasMany(Schedule::class, 'id_lineups');
    }
}

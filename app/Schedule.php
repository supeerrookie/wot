<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    //
    protected $table = 'schedule';

    public function scheduleContent()
    {
        return $this->belongsTo(Lineups::class, 'id_lineups');
    }
  
}

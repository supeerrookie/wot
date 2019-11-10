<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

	protected $table = 'content';

	public function mediaContent()
    {
        return $this->belongsTo(Lineups::class, 'id_lineups');
    }
   
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    //
	protected $table = 'page_content';

	public function pageContent()
    {
        return $this->belongsTo(Page::class, 'id_page');
    }
}


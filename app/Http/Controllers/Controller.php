<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Page;

use App\PageContent;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function mainCategories(){
    	$route = 'main';
        $page = Page::select('id')->where('title', $route)->first();
        $mainCategories = PageContent::select('title','slug','url', 'class_add', 'content')->where(['id_page'=> $page->id, 'status'=>1])->get();
        return $mainCategories;

    }


}


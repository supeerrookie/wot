<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Cookie;

use Carbon\Carbon;

use DB;

use App\Lineups;

use App\Faq;

use App\Media;

use App\Gallery;

use App\Page;

use App\PageContent;

use App\Schedule;

class IndexController extends Controller
{
    public function index(){
        $route = 'homepage';
        $page = Page::select('id')->where('title', $route)->first();
    	$lineup = Lineups::where(['lineups_type' => 'sight'])->inRandomOrder()->limit(6)->get();
        $gals = Gallery::select('id','title','slug','image','year','dateshow','description')->orderBy('year', 'asc')->limit(8)->get();
        $ticket = PageContent::select('title','slug','image','url')->where(['id_page'=> $page->id, 'status'=>1])->get();
    	return view('index')->with(compact('lineup', 'gals', 'ticket'));
    }

    public function about(){
    	$faq = Faq::select('id','title','slug','description','status')->where(['status'=>1])->get();
        $kurator = DB::table('lineups')->select('name','slug','image','bio','description')->where('lineups_type', 'CURATOR')->limit(1)->get();
    	return view('about')->with(compact('faq','kurator'));
    }

    public function gallery(){
        $route = 'gallery';
        $page = Page::select('id')->where('title', $route)->first();
        $exprev = PageContent::select('title','slug','tagline','class_add')->where(['id_page'=> $page->id, 'status'=>1])->get();
        $galy = Gallery::select('title','slug','image','year','dateshow','description')->orderBy('year', 'asc')->where(['exclusive' => 0])->get();
        $exclusive = Gallery::select('title','slug','image','year','dateshow','description')->where(['exclusive' => 1])->limit(3)->get();
        $galyz3 = Gallery::select('title','slug','image','year','dateshow','description')->inRandomOrder()->limit(3)->get();
        if($galy){
    	   return view('gallery')->with(compact('galy','galyz3', 'exprev', 'exclusive'));
        }else{
            abort(404);
        }
    }

    public function lineups(){
        $route = 'Lineups';
        $page = Page::select('id')->where('title', $route)->first();
        $list = PageContent::select('title','slug','tagline','class_add')->where(['id_page'=> $page->id, 'status'=>1])->get();
    	return view('lineups')->with(compact('list'));
    }

    public function lineupsDetail($slug=null){

        $lineup = Lineups::where('slug', $slug)->limit(1)->first();
        $stage = DB::table('lineups')->select('name','slug','image', 'lineups_type')->where(['lineups_type'=>$lineup->lineups_type])->where('lineups_type','<>','CURATOR')->whereNotIn('slug',[$slug])->limit(4)->get();
        $slugger = $lineup->lineups_type;
        $counts = $lineup->count();
        $dets = Lineups::with('mediaList')->where('slug', $slug)->first();
        if($counts > 0){
            if($dets){
                $detImages = Media::select('id_lineups','title','desc','media')->where(['id_lineups'=>$dets->id, 'media_type'=>'photos', 'status'=>1])->get();
                $getSchedule = Schedule::select('dateperform', 'timeperform')->where(['id_lineups'=>$lineup->id])->limit(1)->get();
                return view('artist')->with(compact('dets', 'detImages', 'stage' ,'slugger','getSchedule'));
            }
            else{
                abort(404);
            }
        }else{
            abort(404);
        }
        
    }

    public function getLineups($stage){
       $stage = DB::table('lineups')->select('name','slug','image','status')->where('lineups_type', $stage)->where('lineups_type','<>','CURATOR')->where(['status'=>'1'])->get();
        if(count($stage)) {
            return response()->json(['data'=>$stage]);
            // return response()->(['data'=>json_encode(($stage)), 'pagination' => $stage->links()]);
        }else{
           return response()->json('empty');
            
           
        }
    }

    public function firstLineups($stage){
        $stage = DB::table('lineups')->select('name','slug','image','status')->where('lineups_type', $stage)->where('lineups_type','<>','CURATOR')->where(['status'=>'1'])->get();
        if(count($stage)) {
            return response()->json(['data'=>$stage]);
        }else{
           return response()->json('empty');
            
           
        }
    }

    public function getSchedule($type){
        $skutt = DB::table('schedule')
            ->join('lineups', 'schedule.id_lineups', '=', 'lineups.id')
            ->select('schedule.id','schedule.id_lineups', 'lineups.name','schedule.dateperform','schedule.stage','schedule.timeperform','schedule.class_add', 'lineups.lineups_type')->where(['lineups.lineups_type' => $type, 'schedule.status'=>'1'])->orderBy('dateperform')->orderBy('timeperform')
            ->get();

        $list = $skutt->groupBy(function($j) {
            return Carbon::parse($j->dateperform)->format('d-M-Y');
        });
            
        if(count($skutt)) {
            return response()->json($list, 200);
        }else{
            return response()->json('empty');
        }
    }

    public function schedule(){
        $route = 'schedule';
        $page = Page::select('id')->where('title', $route)->first();
        $list = PageContent::select('title','slug','tagline','class_add')->where(['id_page'=> $page->id, 'status'=>1])->where('slug','<>','btn-download')->get();

        $btn = PageContent::select('title','slug', 'class_add','url')->where(['id_page'=> $page->id, 'slug' => 'btn-download', 'status'=>1])->limit(1)->get();
        return view('schedule')->with(compact('list', 'btn'));
    }

    public function firstSchedule($type){
        $skutt = DB::table('schedule')
            ->join('lineups', 'schedule.id_lineups', '=', 'lineups.id')
            ->select('lineups.name','schedule.dateperform', 'schedule.timeperform','schedule.class_add', 'lineups.lineups_type','lineups.slug')->where(['lineups.lineups_type' => $type, 'schedule.status'=>'1'])->orderBy('dateperform')->orderBy('timeperform')
            ->get();

        $list = $skutt->groupBy(function($j) {
            return Carbon::parse($j->dateperform)->format('d-M-Y');
        });
            
        if(count($skutt)) {
            return response($list, 200);
        }else{
            return response()->json('empty');
        }
    }


    public function terms(){
        $route = 'terms';
        $page = Page::select('id')->where('title', $route)->first();
        $terms = PageContent::select('title','slug','tagline','class_add', 'content')->where(['id_page'=> $page->id, 'status'=>1])->get();
        return view('terms')->with(compact('terms'));
    }
}

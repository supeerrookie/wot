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

use App\Promo;

use Response;

class IndexController extends Controller
{
    public function index(){
        $route = 'homepage';
        $page = Page::select('id')->where('title', $route)->first();
        $lineup = DB::table('lineups')->select('name','slug','image','status')->where(['lineups_type' => 'sight'])->where(['status'=>1, 'highlights'=>1])->orderBy('position')->limit(6)->get();
        $gals = Gallery::select('id','title','slug','image','year','dateshow','description')->orderBy('year', 'desc')->limit(8)->get();
        $ticket = PageContent::select('title','slug','image','url')->where(['id_page'=> $page->id, 'status'=>1])->get();
        return view('index')->with(compact('lineup', 'gals', 'ticket'));
    }

    public function about(){
        $route = 'about';
        $page = Page::select('id')->where('title', $route)->first();
        $faq = Faq::select('id','title','slug','description','status')->where(['status'=>1])->get();
        $kurator = DB::table('lineups')->select('name','slug','image','bio','description', 'lineups_type')->where('lineups_type', 'LIKE', '%CURATOR%')->limit(2)->get();
        $content = PageContent::select('title','slug','image','url', 'class_add')->where(['id_page'=> $page->id, 'status'=>1])->get();
        return view('about')->with(compact('faq','kurator', 'content'));
    }

    public function gallery(){
        $route = 'gallery';
        $page = Page::select('id')->where('title', $route)->first();
        $exprev = PageContent::select('title','slug','tagline','class_add')->where(['id_page'=> $page->id, 'status'=>1])->get();
        $galy = Gallery::select('title','slug','image','year','dateshow','description')->orderBy('year', 'desc')->where(['exclusive' => 0])->get();
        $exclusive = Gallery::select('title','slug','image','year','dateshow','description')->where(['exclusive' => 1])->orderBy('year', 'desc')->limit(3)->get();
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
       $stage = DB::table('lineups')->select('name','slug','image','status')->where('lineups_type', $stage)->where('lineups_type','<>','CURATOR')->where(['status'=>'1'])->orderBy('position')->get();
        if(count($stage)) {
            return response()->json(['data'=>$stage]);
        }else{
           return response()->json('empty');
        }
    }

    public function firstLineups($stage){
        $stage = DB::table('lineups')->select('name','slug','image','status')->where('lineups_type', $stage)->where('lineups_type','<>','CURATOR')->where(['status'=>'1'])->orderBy('position')->get();
        if(count($stage)) {
            return response()->json(['data'=>$stage]);
        }else{
           return response()->json('empty');
        }
    }

    public function getSchedule($type){
        $skutt = DB::table('schedule')
            ->join('lineups', 'schedule.id_lineups', '=', 'lineups.id')
            ->select('schedule.id','schedule.id_lineups', 'lineups.name','schedule.dateperform','schedule.stage','schedule.timeperform','schedule.class_add', 'lineups.lineups_type', 'lineups.detail')->where(['lineups.lineups_type' => $type, 'schedule.status'=>'1'])->orderBy('dateperform')->orderBy('timeperform')
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
            ->select('lineups.name','schedule.dateperform', 'schedule.timeperform','schedule.class_add', 'lineups.lineups_type','lineups.slug', 'lineups.detail')->where(['lineups.lineups_type' => $type, 'schedule.status'=>'1'])->orderBy('dateperform')->orderBy('timeperform')
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

    public function promo($validate){
        $data = base64_decode($validate);
        $route = 'promo';
        $page = Page::select('id')->where('title', $route)->where('status', '1')->first();
        $date = Carbon::now()->setTime(23,59,59)->format('Y-m-d');
        $datelist = DB::table('promo')->where('date_active', $date)->where(['status'=>'1'])->limit(1)->get();
        if($data === 'getpromowaveoftomorrow2019'){
            if($datelist) {
                if($page){
                    return view('promo');
                }else{
                    abort(404);
                }
            }else{
                return view('errors.error');
            }
        }else{
            return view('errors.error');
        }
    }

    public function detectDevices($validate, $devices){
        $data = base64_decode($validate);
        $promo  = Promo::Where('uuid', $devices)->first();
        if($data === 'getpromowaveoftomorrow2019'){
            if($promo){
                return response()->json(['status'=>'detected', $promo]);
            }else{
                return response()->json('valid');
            }
        }else{
            return view('errors.error');
        }
    }

    public function promoDate($validate, $date){
        $data = base64_decode($validate);
        $datelist = DB::table('promo')->select('url')->where('date_active', $date)->where(['status'=>'1'])->inRandomOrder()->limit(1)->get();
        if($data === 'getpromowaveoftomorrow2019'){
            if(count($datelist)){
                return response($datelist, 200,  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
                return view('promo');
            }
            else{
                return response()->json('empty');
            }
        }else{
            return view('errors.error');
        }
    }

    public function getQrcode($validate, $code){
        $url = $code;
        $data = base64_decode($validate);
        $promo = DB::table('promo')->select('url', 'code_promo', 'status', 'code_reedem_status')->where('url', $url)->where(['status'=>'1', 'code_reedem_status'=>'1'])->limit(1)->get();
        if($data === 'getpromowaveoftomorrow2019'){
            if(count($promo)){
                return response($promo, 200);
            }else{
                return response('empty');
            }
        }else{
            return view('errors.error');
        }
    }

    public function saveDevices($validate, $code, $devices){
        $data = base64_decode($validate);
        $promo = DB::table('promo')->select('code_promo', 'status', 'code_reedem_status')->where('code_promo', $code)->where(['status'=>'1', 'code_reedem_status'=>'1'])->limit(1)->get();
        if($data === 'getpromowaveoftomorrow2019'){
            if(count($promo)){
                $update =  Promo::where('code_promo', $code)->first();
                $update->uuid = $devices;
                $update->status = 0;
                $update->save();
                return response('yes');
            }else{
                return response('empty');
            }
        }else{
            return view('errors.error');
        }
    }

    public function getBook($file)
    {
        if($file){
            $file_path = ('uploads/files/'.$file);
            $headers = [
              'Content-Type' => 'application/pdf',
            ];
            return response()->download($file_path, 'e-booklet.pdf', $headers);
        }else{
           abort(404);
        }
    }

    public function timeout(){
        return view('errors.error');
    }


}

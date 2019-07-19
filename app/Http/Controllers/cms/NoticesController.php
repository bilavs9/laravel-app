<?php

namespace App\Http\Controllers\cms;

use App\Models\Notices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class NoticesController extends CmsController
{
    public function index(){
        $this->data('title',$this->makeTitle('notices'));
        $this->data('noticesData',Notices::orderBy('id','desc')->get());
        return view($this->pagePath.'notices.show_notices',$this->data);
    }
    public function addNotices(Request $request){
        if ($request->isMethod('get')){
            $this->data('title',$this->makeTitle('add_notices'));
            return view($this->pagePath.'notices.add_notices',$this->data);
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'title' =>'required|max:20',
            ]);
            $data['title']= $request->title;
            $data['notice_expiry_days']= 30;
            $data['notice_updated_at'] = Carbon::now();


            if(Notices::create($data)){
                return redirect()->route('notices')->with('success','notice was successfully created');
            }
        }
    }
//    public  function noticeCheck(){
//        $password_update_at = $notices->notice_updated_at;
//        $password_expiry_days =$notices->notice_expiry_days;
//        $password_expiry_at = \Illuminate\Support\Carbon::parse($password_updated_at)->addDays($password_expiry_days);
//        if($password_expiry_at->lessThan(Carbon::now())){
//            echo "expired";
//        }
//        else{
//            echo "not expired";
//        }
//    }
}

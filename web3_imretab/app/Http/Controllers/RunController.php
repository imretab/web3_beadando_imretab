<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Run;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RunController extends Controller
{
    public function ShowCategory(){
        $categories = Category::all();
        return view('Runs.upload_run')->
        with('category_options',$categories);
    }
    public function UploadRun(Request $request){
        $fields = $request->validate([
            'category'=>['required'],
            'runTitle' => ['required'],
            'time' => ['required'],
            'ylink' =>['required'],
            'commentonrun' => ''
        ]);
        $createError = 0;
        $now = date('Y-m-d H:i:s',strtotime('+ 2 hours'));
        try
        {
            $run = Run::create([
                'run_category' => $fields['category'],
                'run_title' => $fields['runTitle'],
                'time' => $fields['time'],
                'youtube_link' => $fields['ylink'],
                'comment_onrun' => $fields['commentonrun'],
                'uploader' => Auth::user()->id,
                'uploaded_at'=>$now,
                'isAccepted'=>0
            ]);
        }
        catch (\Throwable $th) {
            $createError += 1;
            return redirect('/create-run')->withErrors(['time'=>'Bad format for time'])->onlyInput('time');
        }
        return redirect('/create-run');
    }
    public function ShowApproveRun(){
        if(!Auth::check() || Auth::User()->privilage <1){
            return abort(401);
        }
        $runs = Run::select(
            'id',
            'uploader',
            'run_category',
            'run_title',
            'time',
            'youtube_link',
            'comment_onrun',
            'uploaded_at',
            'isAccepted'
        )->paginate(3);
        return view('Runs.list_approverequired')->
        with('allRuns',$runs);
    }
    public function ApproveRun(Run $run){
        if(!Auth::check() || Auth::User()->privilage <1){
            return abort(401);
        }
        
        $run->update(['isAccepted' =>$run->isAccepted == 0 ? 1:0]);
        return redirect('/manage-runs');
    }
    public function ShowAllApprovedRuns(){
        $runs = Run::where('isAccepted','=',1)->
        orderBy('time','asc')->
        orderBy('run_category','asc')
        ->get();
        $count = 0;
        return view('runs.approvedruns',['acceptedRuns'=>$runs,'place'=>$count]);
    }
    public function ShowLoggedInRuns(){
        if(!Auth::check()){
            return abort(401);
        }
        $myRuns = Run::where('uploader','=',Auth::user()->id)->get();
        return view('Runs.list_myruns',['myRuns'=>$myRuns]);
    }
    public function ShowSelectedRun(Run $run){
        if(!Auth::check()){
            return abort(401);
        }
        $run = Run::where('uploader','=',Auth::user()->id)->get();
        return view('Runs.list_myruns',['myRuns'=>$run]);
    }
}

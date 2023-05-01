<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Run;
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
}

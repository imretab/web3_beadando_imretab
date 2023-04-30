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
        $now = now()->format('Y-m-d');
        $run = Run::create([
            'run_category' => $fields['category'],
            'run_title' => $fields['runTitle'],
            'time' => $fields['time'],
            'youtube_link' => $fields['ylink'],
            'comment_onrun' => $fields['commentonrun'],
            'uploader' => Auth::user()->id,
            'uploaded_at'=>$now
        ]);
        return redirect('/create-run');
    }
}

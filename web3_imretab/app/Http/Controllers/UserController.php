<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Login(){
        return view('User.signin');
    }
    public function SignIn(Request $request){
        $fields=$request->validate([
            'email'=>['required'],
            'password'=>['required','min:8']
        ]
        );
        $email = $fields['email'];
        
        $user = User::where('email',$email)->first();
        if($user){
            $isSuspended = $user->status == 1 ? true : false;
        }
        if(auth()->attempt($fields)){
            if($isSuspended){
                $request->session()->invalidate();
                return back()->withErrors(['password'=>'This user has been suspended!'])->onlyInput('password');
            }
            else{
                return redirect('edit-profile');
            }
        }
        return redirect('/sign-in')->withErrors(['password'=>'Invalid credentials'])->onlyInput('password');   
    }
    public function LogOut(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function Profile(){
        return view('User.edit_profile');
    }
    public function EditProfile(Request $request){
        $fields = $request->validate([

        ]);
    }
}

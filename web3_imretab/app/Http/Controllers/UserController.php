<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Run;
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
    public function Register(){
        return view('User.signup');
    }
    public function SignUp(Request $request){
        $fields = $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required','confirmed','min:8'],
            's_link'=>[],
            't_link'=>[]
        ]);
        if($request->hasFile('picture')){
            $fields['picture'] = $request->file('picture')->store('Images/Uploads/Users','public');
            $fields['picture'] = '/storage/'.$fields['picture'];
        }
        else{
            $fields['picture'] = '/default_profilepic.png';
        }
        $fields['password'] = bcrypt($fields['password']);
        $fields['privilage'] = 0;
        $fields['status'] = 0;
        $user = User::create($fields);
        return redirect('/sign-in');
    }
    public function Profile(){
        return view('User.edit_profile');
    }
    public function EditProfile(Request $request){
        $fields = $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['confirmed'],
            't_link'=>[],
            's_link'=>[]
        ]);
        if($request->hasFile('picture')){
            $fields['picture'] = $request->file('picture')->store('Images/Uploads/Users','public');
            $fields['picture'] = '/storage/'.$fields['picture'];
        }
        else{
            $fields['picture'] = '/default_profilepic.png';
        }
        $user = auth()->user();
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->picture = $fields['picture'];
        $user->twitch_link = $fields['t_link'];
        $user->steam_link = $fields['s_link'];
        if($request->has('password') && $request->get('password')!= ''){
            $fields['password'] = bcrypt($fields['password']);
            $user->password = $fields['password'];
        }
        $user->save();
        return redirect('/edit-profile');
    }
    public function ShowProfile(User $user){
        $user = User::where('id','=',$user->id)->get();
        $runs = Run::where('uploader','=',$user[0]->id)->get();
        return view('User.runner_profile',['user'=>$user,'userRuns'=>$runs]);
    }
    public function ListUsers(){
        if (!Auth::check() || Auth::User()->privilage != 2) {
            return abort(401);
        }

        $listOfUsers = User::select(
            'id',
            'name',
            'email',
            'created_at',
            'privilage',
            'status',
            'picture'
        )->paginate(3);
        return view('User.list')->with('Users',$listOfUsers);
    }
    public function ChangeStatus(User $user){
        if (!Auth::check() || Auth::User()->privilage != 2) {
            return abort(401);
        }
        $user->update(['status' => $user->status == 0 ? 1 : 0 ]);
        return redirect('/users');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id())
        {
            $post = Post::all();
     
$usertype=Auth()->user()->usertype;
if($usertype=='user'){
    return view('home.homepage',compact('post'));
}
elseif($usertype=='admin'){
    return view('admin.adminhome');

}
else{
    return redirect()->back();
}
        }
    }

    public function post(){
        return view ('post');
    }

    public function homepage(){
        $post = Post::all();

        return view('home.homepage',compact('post'));

    }
    public function post_details($id){
        $post = Post::find ($id);
        return view('home.post_details',compact('post'));
    }
    public function my_post(){
        $user=Auth::user();
        $userid=$user->id;
        $data = Post::where('user_id','=',$userid)->get();
        return view('home.my_post',compact('data'));
    }

   
}
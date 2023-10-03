<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;


class PostController extends Controller
{   public function postindex(){
    $post = Post::latest()->paginate(5);
    $user = User::all();

    return view('post.post_index',compact('post','user'));
}
    public function create(){
        $user = User::all();

        return view ('post.post_create',compact('user'));
    }

    public function poststore(Request $request)
    {
        $requestdata=[
            'user_id' => $request->user_id,
            'content' =>$request->content,
            'image' => $this->uploadImage($request->file('image')),
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            //'image' => $request->file('image'),

        ];
        // $image_path = $request->file('image')->store('image', 'public');

        // $data = Image::create([
        //     'image' => $image_path,
        // ]);

        // session()->flash('success', 'Image Upload successfully');
        // $name = $request->file('image')->getClientOriginalName();
 
        // $path = $request->file('image')->store('public/images');
 
 
        // $save = new Post;
 
        // $save->name = $name;
        // $save->path = $path;
 
        // $save->save();       


        Post::create($requestdata);
        return redirect()->route('post_index')->withSuccess('Post created successfully.');
    }

    
    public function postshow($id)
    {
        $post = Post::find($id);
        $user = User::all();

        return view('post.post_show',compact('post','user'));

    }

    
    public function postedit($id)
    {
        $post = Post::find($id);
        $user = User::all();

        return view('post.post_edit',compact('post','user'));

    }

    
    public function postupdate(Request $request, $id)
    {           
        $post = Post::find($id);
         $user = User::all();
        $requestdata=[
            'user_id' => $request->user_id,
            'content' =>$request->content,
            'image' => $this->uploadImage ($request->file('image')),
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',



        ];

        $post->update($requestdata);
        return redirect()->route('post_index')->withSuccess('Post updated successfully.');
    
    }

    
    public function postdestroy($id)
    {            
        
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('post_index')->withSuccess('Post deleted successfully.');
    
    }
     public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/post'), $fileName);
        return $fileName;
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ps=Post::all();
        $user=User::all();

        return view('home', compact('ps','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $post = new Post();
            $post->posttitle = $request->input('posttitle');
                 if ($request->hasFile('image')) {
                     $image = $request->file('image');
                     $fileName = time() . '.' . $image->getClientOriginalExtension();
                     $image->storeAs('public/images', $fileName);
            
                    // Kaydedilen dosyanın yolunu kullanarak veritabanına kaydetme işlemi
                     $post->image = 'images/' . $fileName;
            }
            $post->category_id = $request->input('category_id');
            $post->user_id = $user_id;
            $post->save();

        return redirect('/home');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id,$postId)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $m = Post::find($id);
        return view('post.edit' , compact('m'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $n = Post::find ($id);  
        $n->posttitle=$request->input('posttitle');
        $n->category_id=$request->input ('category_id') ;
    
         if ($request->hasFile('image')) {

           Storage::delete('public/'.$n->image);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/image', $imageName); // 'photos' klasörüne kaydet
        $n->image = 'image/'.$imageName;
    }
    else{
        $n->image=$n->image;
    }
      $n->save();
      return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d= Post::find($id);

        Storage::delete('public/'.$d->image);
 
        $d->delete ();
        return redirect('/home');
    }
}

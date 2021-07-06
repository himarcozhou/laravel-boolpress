<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('posts.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //controllo
    //     $request->validate([
    //         'title'=> 'required|max:255',
    //     ]);
    //     $newPostData = $request->all();
    //     $newPost = new Post();
    //     $newPost->fill($newPostData);
        
    //     $newPost -> save();

    //     return redirect()->route('posts.show', $newPost -> id);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($slug)
    // {
    //     $post = Post::where('slug', $slug)->first();
    //     if(is_null($post)){
    //         abort(404);
    //     }

    //     return view("posts.show", [
    //         "post" => $post
    //     ]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Post $post)
    // {
    //     if(is_null($post)){
    //         abort(404);
    //     }

    //     return view ("posts.edit",[
    //         "post" => $post
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $post = Post::findOrFail($id); // se non trova fa un abort(404)
    //     $formData = $request->all();

    //     $post -> update($formData);

    //     return redirect()->route('posts.show', $post->id);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $post = Post::findOrFail($id); // se non trova fa un abort(404)
    //     $post -> delete();

    //     return redirect()->route('posts.index');
    // }
}

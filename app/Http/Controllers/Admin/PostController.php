<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = [
            'posts' => Post::orderBy("created_at", "DESC")
                ->where("user_id", $request->user()->id)
                ->get()
        ];

        return view("admin.posts.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();

        return view('admin.posts.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // a questo punto possiamo far vedere come funziona la validazione backend
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => "nullable|exists:categories,id"
        ]);

        $form_data = $request->all();
        $new_post = new Post();
        $new_post->fill($form_data);

        $new_post->user_id = $request->user()->id;

        // genero lo slug
        $slug = Str::slug($new_post->title);
        $slug_base = $slug;

        // cerco nel db se esiste gia' questo slug
        $post_presente = Post::where('slug', $slug)->first();
        $contatore = 1;

        // se trovo lo slug gia' esistente nel db, genero gli slug con un contatore alla fine
        while ($post_presente) {
            // rename slug aggiungendo il contatore alla fine
            $slug = $slug_base . ' (' . $contatore . ')';
            $contatore++;
            $post_presente = Post::where('slug', $slug)->first();
        }

        // quando esco dal while sono sicuro che lo slug non esiste nel db
        // assegno lo slug al post
        $new_post->slug = $slug;

        $new_post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        $categories = Category::all();

        $data = [
            'post' => $post,
            'categories' => $categories
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => "nullable|exists:categories,id" // controlla il valore del campo, esista nella tabella categories
        ]);

        $form_data = $request->all();

        // verifico se il titolo ricevuto dal form è diverso dal vecchio titolo
        if ($form_data['title'] != $post->title) {
            // è stato modificato il titolo => devo modificare anche lo slug
            // genero lo slug
            $slug = Str::slug($form_data['title']);
            $slug_base = $slug;
            // verifico che lo slug non esista nel database
            $post_presente = Post::where('slug', $slug)->first();
            $contatore = 1;
            // entro nel ciclo while se ho trovato un post con lo stesso $slug
            while ($post_presente) {
                // genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slug_base . ' (' . $contatore . ')';
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }
            // quando esco dal while sono sicuro che lo slug non esiste nel db
            // assegno lo slug al post
            $form_data['slug'] = $slug;
        }

        $post->update($form_data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}

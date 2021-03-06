<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(1);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            // .* validazione su tutto array tags, per controllare che l'id del tag scelto esista nella tabella tags
            'tags.*' => 'exists:tags,id'
        ]);

        $data = $request->all();

        // Get User Id
        $data['user_id'] = 1;

        // Generate post Slug
        $data['slug'] = Str::slug($data['title'], '-');

        // Assegnazione di massa grazie al fillable
        $newPost = new Post();
        $newPost->fill($data);

        // Salvataggio
        $saved = $newPost->save();

        if ($saved) {
            if (!empty($data['tags'])){
                $newPost->tags()->attach($data['tags']);
            }

            return redirect()->route('posts.show', $newPost->slug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // Check su Slug
        if (empty($post)) {
            abort('404');
        }
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        // Porto anche i tag
        $tags = Tag::all();

        // Check su Slug
        if (empty($post)) {
            abort('404');
        }

        return view('posts.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags.*' => 'exists:tags,id'
        ]);
        
        $data = $request->all();

        $updated = $post->update($data);

        if ($updated){
            if(!empty($data['tags'])){
                // Controlla gli id e aggiunge relazioni se mancano
                $post->tags()->sync($data['tags']);
            } else{
                // Elimina tutte le relazioni incoerenti in cascata
                $post->tags()->detach();
            }

            return redirect()->route('posts.show',$post ['slug']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $title = $post->title;
        // Rimuovo relazioni
        $post->tags()->detach();

        $deleted = $post->delete();

        if($deleted){
           return redirect()->route('posts.index')->with('post-deleted', $title);
       }
    }
}

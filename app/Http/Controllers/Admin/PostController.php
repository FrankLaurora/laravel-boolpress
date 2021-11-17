<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{   
    protected $validationRules = [
        'title' => 'string|required|max:100',
        'content' => 'string|required',
        'category_id' => 'nullable|exists:categories,id'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newPost = new Post();

        $newPost->fill($request->all());

        $newPost->slug = $this->getSlug($newPost->title);

        $newPost->save();

        return redirect()->route('admin.posts.index')->with('success', "Il post è stato creato correttamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
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
        $request->validate($this->validationRules);
        
        if($post->title != $request->title) {
            $post->slug = $this->getSlug($request->title);
        };
        
        $post->fill($request->all());


        $post->save();
        
        return redirect()->route('admin.posts.index')->with('success', "L'articolo {$post->id} è stato modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', "Articolo {$post->id} cancellato correttamente.");
    }

    protected function getSlug($title) 
    {
        // creo lo slug con l'helper partendo dal $title
        $slug = Str::of($title)->slug('-');
        //creo una variabile che avrà un valore diverso da null nel momento in cui il database conterrà una entry la cui voce slug sarà uguale a quella che ho appena creato
        $duplicateSlug = Post::where('slug', $slug)->first();
        //inizializzo un contatore che utilizzerò per aggiungere un numero incrementale allo slug nel caso in cui ci fosse un duplicato
        $count = 2;
        //entro in un ciclo while nel caso in cui il valore di $duplicateSlug non sia null
        while($duplicateSlug) {
            // creo un nuovo slug concatenando il valore del count
            $slug = Str::of($title)->slug('-') . "-{$count}";
            //verifico che il nuovo slug non esista
            $duplicateSlug = Post::where('slug', $slug)->first();
            //se il nuovo slug non esiste il valore di $duplicateSlug sarà nullo ed uscirò dal ciclo
            //aumento il contatore per far sì che, in caso di slug duplicato, venga assegnato un nuovo valore alla successiva iterazione del ciclo
            $count++;
        }
        // restituisco lo slug
        return $slug;
    }
}

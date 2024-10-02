<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $articles = Article::all();
        return view('articles', ['articles' => $articles]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $tags = Tag::all(); // Recupero tutti i tags dalla tabella tags
        return view('articles.create', compact('tags'));
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        $article->tags()->attach($request->tags);
         // Qui sto utilizzando il metodo di relazione Many to many che ho definito nel modello, compio questa operazione quando devo scrivere nel db
         // con il metodo attach gli passo gli ID degli oggetti che voglio mettere in relazione al modello di partenza

        return redirect()->back()->with('message', 'Articolo creato con successo');
    }

    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {
        return view('articles.detail', compact('article'));
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        $article->tags()->sync($request->tags); //Sincronizza l'attuale relazione aggiornata tra i tag selezionati e quelli deselezionati
        return redirect(route('articles.index'))->with('message', 'Articolo aggiornato con successo');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'))->with('message', 'Articolo eliminato con successo');
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiIndex(){

        $articles = Article::when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->with(['user', 'category'])->orderBy("id", "desc")->paginate(10) ;
        return $articles ;

    }
    
    public function index()
    {

        $all = Article::all() ;
        
        // foreach($all as $a){
        //     $a->slug = Str::slug($a->title)."-".uniqid() ;
        //     $a->category_slug = $a->category->title ;
        //     $a->excerpt = Str::words($a->description, 50);
        //     $a->update() ;
        // }

        $articles = Article::when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->with(['user', 'category'])->orderBy("id", "desc")->paginate(7) ;
        return view('article.index', compact('articles')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
            "category" => "required|exists:categories,id",
            "title" => "required|min:3|max:200",
            "description" => "required|min:5"
        ]);
        
        $article = new Article();
        $article->title = $request->title ;
        $article->slug = Str::slug($request->title)."-".uniqid() ;
        $article->description = $request->description ;
        $article->excerpt = Str::words($request->description, 50) ;
        $article->category_id = $request->category ;
        $article->user_id = Auth::id() ;
        $article->save();

        $article->category_slug = $article->category->title ;
        $article->update() ;

        return redirect()->route('article.index')->with('message', "New Article is Added") ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "category" => "required|exists:categories,id",
            "title" => "required|min:3|max:200",
            "description" => "required|min:5"
        ]);
        
        $article->title = $request->title ;
        $article->slug = Str::slug($request->title)."-".uniqid() ;
        $article->description = $request->description ;
        $article->excerpt = Str::words($request->description, 50) ;
        $article->category_id = $request->category ;
        $article->category_slug = $article->category->title ;
        $article->update();

        return redirect()->route('article.index')->with('message', "Article is Updated") ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete() ;
        return redirect()->route('article.index',['page'=>request()->page])->with('deleteMessage', "Article is Deleted") ;
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->with(['user', 'category'])->orderBy("id", "desc")->paginate(7) ;
        return view('welcome', compact('articles'));
    }

    public function detail($slug){

        $article = Article::where("slug", $slug)->first() ;
        if(empty($article)){
            return abort(404);
        }
        return view('blog.detail', compact('article'));
    }

    public function baseOnCategory($slug){
        
        $articles = Article::when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->where('category_slug', $slug)->with(['user', 'category'])->orderBy("id", "desc")->paginate(7) ;
        return view('welcome', compact('articles'));

    }

    public function baseOnUser($name){

        $user = User::where("name", $name)->first();
        
        $articles = Article::where('user_id', $user->id)->when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->with(['user', 'category'])->orderBy("id", "desc")->paginate(7) ;
        return view('welcome', compact('articles'));

    }

    public function baseOnDate($date){
        
        $articles = Article::where('created_at', $date)->when(isset(request()->search), function($q){

            $search = request()->search ;
            $q->where("title","like", "%$search%")->orwhere('description', "like", "%$search%") ;

        })->with(['user', 'category'])->orderBy("id", "desc")->paginate(7) ;
        return view('welcome', compact('articles'));

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){

$categories = Category::all();

$articles = Article::with(['category'])
->where('is_featured', 'not_featured')
->latest()
->take(3)
->get();

$author = Author::all(); 
        
        return view('front.index', compact('categories'));
        
    }
    
    
}
<?php

namespace App\Http\Controllers;
use App\Models\BannerAdvertisement;
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

$featured_articles = Article::with(['category'])
->where('is_featured', 'featured')
->inRandomOrder()
->take(3)
->get();

$authors = Author::all(); 

$bannerads = BannerAdvertisement::where('is_active', 'active')
->where('type', 'banner')
->inRandomOrder()
// ->take(1)
->first();

$bullying_articles = Article::whereHas('category', function ($query) {
    $query->where('name', 'bullying');
})
->where('is_featured', 'not_featured')
->latest()
->take(3)
->get();

$bullying_featured_articles = Article::whereHas('category', function ($query) {
    $query->where('name', 'bullying');
})
->where('is_featured', 'featured')
->inRandomOrder()
->first();

// Correct the view call here
return view('front.index', compact('categories', 'articles', 'authors', 'featured_articles', 'bannerads', 'bullying_articles', 'bullying_featured_articles'));
}
        
public function category(Category $category){
    $categories = Category::all();
    $bannerads = BannerAdvertisement::where('is_active', 'active')
    ->inRandomOrder()
    ->first();
    return view('front.category', compact('category', 'categories'));
}

    }
    
     
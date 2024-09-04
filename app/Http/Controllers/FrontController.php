<?php

namespace App\Http\Controllers;
use App\Models\BannerAdvertisement;
use App\Models\Category;
use App\Models\Article;
use App\Models\Author;
use App\Models\Report;
use App\Models\Video;
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
      
public function category($slug){
    $category = Category::where('slug', $slug)->first();
    $categories = Category::all();
    $bannerads = BannerAdvertisement::where('is_active', 'active') 
    ->inRandomOrder()
    ->first();
    $videos = '';
    if($slug == 'video' ) {
        $videos = Video::all();
    }
 
    return view('front.category', compact('category', 'categories','bannerads','videos'));
}

public function details($slug){
    $article = Article::where('slug', $slug)->first();
    $articles = Article::all();
    $bannerads = BannerAdvertisement::where('is_active', 'active');
    $categories = Category::all();
    
    return view('front.details', compact('article','categories', 'bannerads', 'articles'));
}
public function author(Author $author){
    $categories = Category::all();
    $bannerads = BannerAdvertisement::where('is_active', 'active')
    ->inRandomOrder()
    ->first();
    return view ('front.author', compact('categories', 'author', 'bannerads'));
    
}
public function about(){
    return view('front.about');
}

 // Method untuk menampilkan form laporan bullying
    public function showReportForm()
    {
        return view('front.report');
    }

    // Method untuk menangani pengiriman laporan bullying
    public function submitReport(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'incident' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'anonymous' => 'required|boolean',
        ]);

        Report::create($validatedData);

        return redirect()->route('front.report')->with('success', 'Laporan Anda telah berhasil dikirim.');
    }
}




    
    
     
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function berita(Request $request)
    {
        $posts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(9);
        
        return view('frontend.berita', compact('posts'));
    }

    public function beritaShow($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        
        // Increment views
        $post->increment('views_count');
        
        $relatedPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, function ($query) use ($post) {
                return $query->where('category_id', $post->category_id);
            })
            ->limit(3)
            ->get();
        
        return view('frontend.berita-show', compact('post', 'relatedPosts'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        
        return view('frontend.page', compact('page'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }

    public function galeri()
    {
        return view('frontend.galeri');
    }

    public function login()
    {
        // Redirect if already logged in
        if (auth()->check()) {
            return redirect('/admin');
        }
        return view('frontend.login');
    }
}

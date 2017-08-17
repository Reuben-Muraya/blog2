<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
	protected $limit = 3;
	
    public function index()
    {
    	$categories = Category::with(['posts' => function($query) {
    		$query->published();
    	}])->orderBy('title', 'asc')->get();

    	$posts = Post::with('author')
    	            ->latest()
    	            ->published()
    	            ->simplePaginate($this->limit);

    	return view('blog.index', compact('posts', 'categories'));
    }

    public function category($id)
    {
    	$categories = Category::with(['posts' => function($query) {
    		$query->published();
    	}])->orderBy('title', 'asc')->get();

    	$posts = Post::with('author')
    	            ->latest()
    	            ->published()
    	            ->where('category_id', $id)
    	            ->simplePaginate($this->limit);

    	return view('blog.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
    	$post = Post::published()->findOrFail($id);
    	return view('blog.show', compact('post'));
    } 
}

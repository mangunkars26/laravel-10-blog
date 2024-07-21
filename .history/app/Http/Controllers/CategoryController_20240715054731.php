<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{


    public function showCategory()
    {
        $categories = Category::query()
            //            ->with(['posts' => function ($query) {
            //                $query->orderByDesc('published_at');
            //            }])
            ->whereHas('posts', function ($query) {
                $query
                    ->where('active', '=', 1)
                    ->whereDate('published_at', '<', Carbon::now());
            })
            ->select('categories.*')
            ->selectRaw('MAX(posts.published_at) as max_date')
            ->leftJoin('category_post', 'categories.id', '=', 'category_post.category_id')
            ->leftJoin('posts', 'posts.id', '=', 'category_post.post_id')
            ->orderByDesc('max_date')
            ->groupBy([
                'categories.id',
                'categories.title',
                'categories.slug',
                'categories.created_at',
                'categories.updated_at',
            ])
            ->limit(5)
            ->get();


        return view('home', compact(
            'latestPost',
            'popularPosts',
            'recommendedPosts',
            'categories'
        ));
    }
}

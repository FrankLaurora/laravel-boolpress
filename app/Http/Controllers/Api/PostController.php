<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Dotenv\Result\Success;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([           
            'success' => true,
            'data' => $posts
        ]);
    }
}

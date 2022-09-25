<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $conditions = $request->all();
        $posts = $this->postService->searchPost($conditions);
        return view('post.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $insertData = array();
        $insertData['nickname'] = $data['nickname'];
        $insertData['title'] = $data['title'];
        $insertData['type'] = $data['type'];
        $insertData['accuracy'] = $data['accuracy'];
        $insertData['name'] = $data['name'];
        $insertData['img'] = $data['img'];
        // $insertData['img-path'] = $data['img-path'];
        $insertData['content'] = $data['content'];

        $this->postService->create($insertData);

        return redirect()->route('post.index');
    }
}

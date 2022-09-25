<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;

class PostService
{

    private $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function searchPost($conditions, $limit=8)
    {
       return $this->postRepo->searchPost($conditions, $limit);
    }

    public function create($insertData)
    {
        $insert = array();
        $insert['nickname'] = $insertData['nickname'];
        $insert['title'] = $insertData['title'];
        $insert['type'] = $insertData['type'];
        $insert['accuracy'] = $insertData['accuracy'];
        $insert['name'] = $insertData['name'];
        $insert['img'] = $insertData['img'];
        // $insert['img-path'] = $insertData['img-path'];
        $insert['content'] = $insertData['content'];

        $this->postRepo->create($insert);
    }
}

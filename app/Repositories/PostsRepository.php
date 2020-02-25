<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsRepository implements PostsInterface
{
    /**
     * @return mixed
     */
    public function getPosts()
    {
        $posts = [];
        $posts = Post::all();

        if ($posts) {
            return $posts;
        }

        return $posts;
    }

    /**
     * @param null $id
     * @return \Illuminate\Support\Collection
     */

    public function getPost($id = null)
    {
        $posts = Post::all();
        if ($id) {
            $posts = $posts->find($id);
        }
        return $posts;
    }
}

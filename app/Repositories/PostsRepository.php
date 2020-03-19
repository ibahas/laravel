<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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


    /**
     * $user_id User Auth now
     */

    public function getPostsByUserId($user_id)
    {
        $posts = post::all()->where('user_id', $user_id);
        if (Auth::user()->id == $user_id || Auth::user()->role_id == 1) {
            return response()->json($posts);
        } else {
            $var = array('status', 404);
            return $var;
        }

    }

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return response mixed or array
     */
    public function getPostForUserInAuth($id)
    {
        $post = post::find($id);
        if (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1) {
            return response()->json($post);
        } else {
            $var = array('status', 404);
            return $var;
        }
    }
}

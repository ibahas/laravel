<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface;

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


    /**
     * Undocumented function
     *
     * @return withTrashed()
     */
    public function getQueryBuilder()
    {
        return Post::withTrashed()->get();
    }

    /**
     * Get Data OnlyTrashed()
     *
     * @return void
     */
    public function getOnlyTrashed()
    {
        return post::onlyTrashed()->get();
    }


    /**
     * force Delete
     *
     * @param [type] $id
     * @return void
     */
    public function getForceDeletePosts($id)
    {


        $findOfPost = post::find($id);
        if(Auth::user()->role_id == 1 || Auth::user()->id == $findOfPost->user_id)
        {
            $post = post::withTrashed()->find($id);
            $post->forceDelete();
            return response()->json('Success deleted');
        }else{
            return response()->json('This Post You Can\'t be Change it');
        }
    }

    /**
     * Resotre A post
     *
     * @param [type] $id
     * @return void
     */
    public function restorePost($id)
    {
        $findOfPost = post::find($id);
        if(Auth::user()->role_id == 1 || Auth::user()->id == $findOfPost->user_id)
        {
            post::withTrashed()
            ->where('id', $id)
            ->restore();
        return response()->json('This Post has been Restore');
        }else{
            return response()->json('This Post You Can\'t be Change it');
        }
    }

    /**
     * Function to soft Delete
     * @param [type] $id
     */

    public function softDeletePost($id)
    {
        $findOfPost = post::find($id);
        if(Auth::user()->role_id == 1 || Auth::user()->id == $findOfPost->user_id)
        {
            $post = post::find($id);
            $post->delete();

            return response()->json('This Post has been Deleted');
        }else{
            return response()->json('This Post You Can\'t be Change it');
        }

    }
}

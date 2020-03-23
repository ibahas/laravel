<?php

namespace App\Http\Controllers;

use App\models\post;
use App\Repositories\PostsInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $posts;
    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function getPostShow($id = null)
    {
        $posts = $this->posts->getPost($id);
        return $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = $this->posts->getPosts();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }


    /**
     * Get Posts With user_id add a posts
     */

    public function getPostsforUserId($user_id)
    {
        return $this->posts->getPostsByUserId($user_id);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function getPostForUserId($id)
    {
        return $this->posts->getPostForUserInAuth($id);
    }

    /**
     * get With =>> Query Builder
     */

    public function getQueryBuilder()
    {
        return $this->posts->getQueryBuilder();
    }

    /**
     * Get All Posts has been Deleted_at have a value;
     *
     * @return void
     */
    public function getOnlyTrashed()
    {
       return $this->posts->getOnlyTrashed();
    }


    /**
     * Force Deleted
     *
     * @param [type] $id
     * @return void
     */
    public function getForceDeletePosts($id)
    {
        return $this->posts->getForceDeletePosts($id);
    }
    /**
     * Restore Psot
     *
     * @param [type] $id
     * @return void
     */
    public function restorePost($id)
    {
        return $this->posts->restorePost($id);
    }

    /**
     * Sof Delete
     *
     * @param [type] $id
     * @return void
     */
    public function softDeletePost($id)
    {
        return $this->posts->softDeletePost($id);
    }
}

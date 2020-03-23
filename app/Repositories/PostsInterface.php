<?php

namespace App\Repositories;

interface PostsInterface
{
    /**
     * @return mixed
     */

    public function getPosts();

    /**
     * @param null $id
     * @return \Illuminate\Support\Collection
     */

    public function getPost($id = null);

    /**
     * $user_id User Auth now
     */

    public function getPostsByUserId($user_id);
    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return response mixed or array
     */
    public function getPostForUserInAuth($id);

    /**
     * Undocumented function
     *
     * @return withTrashed()
     */
    public function getQueryBuilder();

    /**
     * Undocumented function
     *
     * @return withTrashed()
     */
    public function getOnlyTrashed();

    /**
     * force Delete
     *
     * @param [type] $id
     * @return void
     */
    public function getForceDeletePosts($id);

    /**
     * Resotre A post
     *
     * @param [type] $id
     * @return void
     */
    public function restorePost($id);

        /**
     * Function to soft Delete
     * @param [type] $id
     */

    public function softDeletePost($id);
}

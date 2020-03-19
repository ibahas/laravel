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
}

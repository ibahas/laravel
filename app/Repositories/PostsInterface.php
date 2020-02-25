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
}

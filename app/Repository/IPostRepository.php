<?php

namespace App\Repository;

interface IPostRepository
{

    public function getAllPost();

    public function getSinglePost($id);

    public function createPost(array $data);

    public function editPost($id);

    public function updatePost($id, array $data);


}

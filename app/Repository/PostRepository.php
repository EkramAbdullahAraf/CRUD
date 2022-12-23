<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository implements IPostRepository
{

    public function getAllPost()
    {
        return post::all();
    }

    public function getSinglePost($id)
    {


        return Post::find($id);

    }

    public function createPost(array $data)
    {


        $post = new Post();
        $post->id = $data['id'];
        $post->userId = $data['userid'];
        $post->title = $data['title'];
        $post->completed = $data['complete'];


        $post->save();

    }

    public function editPost($id)
    {
        return Post::find($id);
    }

    public function updatePost($id, array $data)
    {
        Post::find($id)->update([
            'title' => $data['title'],
            'completed' => $data['completed']
        ]);
    }

}


?>

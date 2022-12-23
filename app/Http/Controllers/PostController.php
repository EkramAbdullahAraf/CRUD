<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\DataTables\postDataTable;

namespace App\Http\Controllers;

use App\Repository\IPostRepository;

class PostController extends Controller
{

    public $post;

    public function __construct(IPostRepository $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        // return all posts

        $posts = $this->post->getAllPosts();

        return view('post.index')->with('posts', $posts);

    }

    public function show($id)
    {
        // get single post

        $post = $this->post->getSinglePost($id);
        return view('post.show')->with('post', $post);
    }


    public function create()
    {

        // create page
        return view('post.create');
    }


    public function edit($id)
    {
        $post = $this->post->editPost($id);
        return view('post.edit')->with('post', $post);
    }


    public function update(Request $request, $id)
    {

        // validate and store data
        $request->validate([
            'useId' => 'required',
            'completed' => 'required'
        ]);

        $data = $request->all();

        $this->post->updatePost($id, $data);

        return redirect('/posts');

    }

    public function store()
    {
        $api_url = 'https://jsonplaceholder.typicode.com/todos';
        $response = Http::get($api_url);
        $data = json_decode($response->body());
        echo "<pre>";
        foreach ($data as $post) {
            $post = (array)$post;
            Post::updateOrCreate(
                ['id' => $post['id']],
                [
                    'id' => $post['id'],
                    'userId' => $post['userId'],
                    'title' => $post['title'],
                    'completed' => $post['completed'],
                ]


            );
        }


        //print_r($data);
        dd("Data Stored");

    }
}

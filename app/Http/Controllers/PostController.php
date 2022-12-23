<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\DataTables\postDataTable;

class PostController extends Controller
{
    //
    public function index(postDataTable $dataTable)
    {
        echo $dataTable->render('post');
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


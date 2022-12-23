<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\PostRepository;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\DataTables\postDataTable;
use App\Repository\IPostRepository;
use DataTables;

class PostController extends Controller
{
    public $post;

    public function __construct(IPostRepository $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

//    public function index()
//    {
//        // return all posts
//
//        $posts = $this->post->getAllPost();
//
//        return view('index')->with('posts', $posts);
//
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    return '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('index');
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
            return '<a href="/posts" class="btn btn-block btn-primary" >Fetched, GO BACK </a>';
        }

        //print_r($data);
        dd('Fetched');

    }

}

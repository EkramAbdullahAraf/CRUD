{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Posts</title>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"--}}

{{--    <script src="https://code.jquery.com/jquery-3.6.3.min.js"--}}
{{--            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"--}}
{{--            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"--}}
{{--            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src=" https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<section style="padding-top:60px;">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                {!! $dataTable -> table() !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--{!! $dataTable->scripts() !!}--}}
{{--</body>--}}

{{--</html>--}}
@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-2">All Products</h1>
    <hr>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-6" style="display:flex">
                @foreach ($products as $post)
                    <div class="card m-2 p-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->userId }}</h5>
                            <h5 class="card-title">Price: ${{ $post->title }}</h5>
                            <hr>
                            <p class="card-text">{{ $post->completed}} </p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

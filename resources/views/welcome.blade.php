<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="my-5">
        <div class="row">
            <div class="col-12">
                <h3>Post Lists</h3>
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Post::all() as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category_id}}</td>
                                <td>{{$post->description}}</td>
                                <td>
                                    <form action="{{route('post.destroy',$post->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{$post->created_at->format('d-m-Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3>Post Trashes</h3>
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Post::onlyTrashed()->get() as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category_id}}</td>
                                <td>{{$post->description}}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="{{route('post.restore',$post->id)}}" method="post">
                                            @csrf

                                            <button class="btn btn-sm btn-outline-warning">Restore</button>
                                        </form>
                                        <form action="{{route('post.forceDelete',$post->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger">Delete Permanently</button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{$post->created_at->format('d-m-Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    @extends('layouts.base')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PostMaker</title>
</head>
<body>

    @section('main_page')

    @include('sortByForm')

        @foreach ($mainComments as $mainComment)
            @include('comment', ['comment' => $mainComment])
        @endforeach
            <!-- Pagination   -->
       {{ $mainComments->links()}}

            <!-- Подключение Основной формы -->
        <div class="main-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-center"><h3>Share a Post</h3></div>

                                <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store') }}">
                                    @csrf
                                    @include('commentForm')
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>
</html>

<!DOCTYPE html>
<html lang="en">
    @extends('layouts.base')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>MainPage</title>
</head>
<body>
    @section('content')

    <div class="container">
        <h1>Comments</h1>
        @if ($comments->isEmpty())
            <p>No comments available.</p>
        @else
            <ul class="list-unstyled">
                @foreach ($comments as $comment)
                    <li class="media mb-3">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $comment->user_name }}</h5>
                                    <p>{{ $comment->text }}</p>
                            </div>
                        <button class="btn btn-primary" id="showForm">Reply</button>
                    </li>

                    <div class="bg-light p-2 rounded">
                        <div id="commentForm" class="bg-light p-2 rounded" style="display: none;">
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Reply</label>
                                    <textarea class="form-control" id="message" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить комментарий</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" required>
                            </div>
    
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
    
                            <div class="form-group">
                                <label for="home_page">Home Page</label>
                                <input type="url" class="form-control" id="home_page" name="home_page">
                            </div>
    
                            <div class="form-group">
                                <label for="captcha">CAPTCHA</label>
                                <input type="text" class="form-control" id="captcha" name="captcha" required>
                            </div>
    
                            <div class="form-group">
                                <label for="text">Text</label>
                                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                            </div>

                                    <div class="form-result d-none">Форма успешно отправлена!</div>

                                    <!-- Форма captcha-->
                                    <form id="form" action="/public/php/process-form.php" method="post">
                                    <div class="captcha">
                                        <div class="captcha__image-reload">
                                        <img class="captcha__image" src="/public/php/captcha.php" width="132" alt="captcha">
                                        <button type="button" class="captcha__refresh"></button>
                                        </div>
                                        <div class="captcha__group">
                                        <label for="captcha">Код, изображенный на картинке</label>
                                        <input type="text" name="captcha" id="captcha">
                                        <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <button type="submit">Отправить</button>
                                    </form>


    
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        //click to button msg
        document.getElementById('showForm').addEventListener('click', function () {
            var commentForm = document.getElementById('commentForm');
            commentForm.style.display = (commentForm.style.display === 'none') ? 'block' : 'none';
        });
    </script>


    @endsection
</body>
</html>
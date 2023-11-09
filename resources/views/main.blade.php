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

    @section('main_page')

    @foreach ($mainComments as $mainComment)
    @include('comment', ['comment' => $mainComment])        
    @endforeach
    
            <!-- Pagination   -->
       {{ $mainComments->links()}}
            
            <!-- Подключение Основной формы -->
        <div class="main-form">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Добавить основной комментарий</div>
                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('comments.store') }}">
                                    @csrf
                                    @include('commentForm')
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript для отображения и скрытия формы ответа по нажатию кнопки "Reply"
            document.querySelectorAll('.reply-btn').forEach(function(replyBtn) {
                replyBtn.addEventListener('click', function() {
                    var commentId = this.getAttribute('data-comment-id');
                    var replyForm = document.querySelector('.reply-form[data-comment-id="' + commentId + '"]');
        
                    // Переключение отображения формы ответа для выбранного комментария
                    if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                        // Если форма скрыта, показать ее
                        replyForm.style.display = 'block';
                    } else {
                        // Если форма отображается, скрыть ее
                        replyForm.style.display = 'none';
                    }
                });
            });
        </script>
    @endsection
    
</body>
</html>
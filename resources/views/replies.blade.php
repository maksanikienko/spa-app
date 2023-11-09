<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

                    <!-- Главные комментарии -->
        @foreach ($mainComments as $mainComment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $mainComment->user_name }} написал:</h5>
                <p class="card-text">{{ $mainComment->text }}</p>
            </div>

             <!-- Вывод дочерних комментариев -->
            @foreach ($childComments as $childComment)
                @if ($childComment->parent_id === $mainComment->id)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $childComment->user_name }} ответил:</h6>
                            <p class="card-text">{{ $childComment->text }}</p>

                            <!-- Кнопка "Ответить" для дочернего комментария -->
                            <button class="btn btn-link reply-btn" data-comment-id="{{ $childComment->id }}">Reply</button>

                            <!-- Форма ответа на дочерний комментарий -->
                            <form action="{{ route('comments.store') }}" method="post" class="card-footer reply-form" data-comment-id="{{ $childComment->id }}" style="display:none;">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $childComment->id }}">
                                @include('commentForm')
                            </form>
                            
                        </div>
                    </div>
                @endif
            @endforeach

             <!-- Кнопка "Reply" для отображения формы ответа -->
            <div class="card-footer">
                <button class="btn btn-link reply-btn" data-comment-id="{{ $mainComment->id }}">Answer</button>
            </div>

            <!-- Форма reply на главный комментарий -->
            <div class="card-footer reply-form" data-comment-id="{{ $mainComment->id }}" style="display:none;">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                        <input type="hidden" name="parent_id" value="{{ $mainComment->id }}">
                        @include('commentForm')
                </form>
            </div>            
          
        </div>
        @endforeach

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

</body>
</html>
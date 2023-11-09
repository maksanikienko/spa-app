    
    <div class="card mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user_name }} написал:</h5>
                <p class="card-text">{{ $comment->text }}</p>
            </div>
        </div>


         <!-- Кнопка "Ответить" для основного комментария -->
    <div class="card-footer">
        <button class="btn btn-link reply-btn" data-comment-id="{{ $comment->id }}">Reply</button>
    </div>
    
        <!-- Форма reply для основного комментария -->
        <div class="card-footer reply-form" data-comment-id="{{ $comment->id }}" style="display:none;">
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                @include('commentForm')
            </form>
        </div>
        
        <div class="card-child">
            @if($comment->replies->isNotEmpty())
                <div class="child-comments ml-4"> <!-- Добавляем отступ для дочерних комментариев -->
                    @foreach($comment->replies as $reply)
                        @include('comment', ['comment' => $reply])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    
    
    

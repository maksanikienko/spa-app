
             <!-- Отображение карточки комментария -->
    <div class="card mb-3">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                        @if($comment->avatar_image_path)
                            <img class = "avatar_image" src="{{ asset('storage/avatar_memoji_images/' . $comment->avatar_image_path) }}" alt="Avatar" >
                        @endif
                        <h5> <strong>{{ $comment->user_name }}</strong> - <em>{{ $comment->created_at->format('d.m.Y H:i') }}</em></h5>
                </div>
                <p class="card-text">{{ $comment->text }}</p>
                    @if($comment->image_path)
                    <a href="{{ asset('storage/' . $comment->image_path) }}" data-lightbox="comment-images" data-title="Comment Image">
                        <img src="{{ asset('storage/' . $comment->image_path) }}" alt="Comment Image" >
                    </a>
                    @endif
            </div>
        </div>

             <!-- Кнопка Reply -->
        <div class="card-footer">
            <button class="btn btn-secondary btn-sm reply-btn" data-comment-id="{{ $comment->id }}">Reply</button>
        </div>

         <!-- Форма reply для основного комментария -->
         <div class="card-footer reply-form captcha-container" data-comment-id="{{ $comment->id }}" style="display:none;">
            <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                @include('commentForm')
            </form>
        </div>
    </div>

             <!-- Вывод reply постов -->
    <div class="card-child">
            <div class="child-comments ml-4">
                @foreach($comment->replies as $reply)
                    @include('comment', ['comment' => $reply])
                @endforeach
            </div>
    </div>

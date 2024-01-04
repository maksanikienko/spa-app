
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-header">
                <img class="avatar_image" src="{{ asset('storage/avatar_memoji_images/' . $comment->avatar_image_path) }}" alt="Avatar">
                    <h5><strong>{{ $comment->user_name }}</strong> - <em>{{ $comment->created_at->format('d.m.Y H:i') }}</em></h5>
                    <!-- svg mark-->
                    @if (Auth::check() && Auth::user()->name === $comment->user_name)
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48" class="svg-check">
                            <polygon fill="#42a5f5" points="29.62,3 33.053,8.308 39.367,8.624 39.686,14.937 44.997,18.367 42.116,23.995 45,29.62 39.692,33.053 39.376,39.367 33.063,39.686 29.633,44.997 24.005,42.116 18.38,45 14.947,39.692 8.633,39.376 8.314,33.063 3.003,29.633 5.884,24.005 3,18.38 8.308,14.947 8.624,8.633 14.937,8.314 18.367,3.003 23.995,5.884"></polygon>
                            <polygon fill="#fff" points="21.396,31.255 14.899,24.76 17.021,22.639 21.428,27.046 30.996,17.772 33.084,19.926"></polygon>
                        </svg>
                    @endif
            </div>

            <div class="card-footer">
                <span class="comment-text">{{ $comment->text }}</span>

                <!-- Update Button-->
                @if (Auth::check() && Auth::user()->name === $comment->user_name)
                    <button class="btn btn-secondary btn-sm update-button" onclick="toggleUpdateForm({{ $comment->id }})">Edit</button>
                @endif

                <!-- Delete Post-->
               @include('delete-post-form')

            </div>

            @if($comment->image_path)
                <a href="{{ asset('storage/' . $comment->image_path) }}" data-lightbox="comment-images" data-title="Comment Image">
                    <img class="comment-image" src="{{ asset('storage/' . $comment->image_path) }}" alt="Comment Image">
                </a>
            @endif

                <!-- Reply Form-->
                <div class="reply-button" data-comment-id="{{ $comment->id }}">
                    <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <post-component
                            @if (Auth::check())
                                :auth-username="{{ json_encode(Auth::user()->name) }}"
                                :auth-email="{{ json_encode(Auth::user()->email) }}"
                            @endif
                            :avatar="{{ json_encode($avatar) }}">
                        </post-component>
                    </form>
                </div>

            <!-- Update Message-->
            <form action="{{ route('comments.update', $comment->id) }}" method="post" class="update-form" data-comment-id="{{ $comment->id }}" id="updateForm{{$comment->id}}">
                @csrf
                @method('PATCH')
                <label for="text" class="form-label ml-2">Message:</label>
                <textarea name="text"  class="form-control mb-3" rows="4">{{ $comment->text }}</textarea>
                <button type="submit" class="btn btn-primary mb-2 ml-2">Send</button>
            </form>
        </div>
    </div>

            <!-- Reply Message-->
            <div class="card-child">
                @foreach($comment->replies as $reply)
                    @include('comment', ['comment' => $reply])
                @endforeach
            </div>







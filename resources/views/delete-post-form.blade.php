
    <!-- Delete Post-->
    <form id="deleteForm{{ $comment->id }}" class="delete-form" action="{{ route('comments.destroy', $comment->id) }}" method="post" onsubmit="confirmDelete({{ $comment->id }});">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger btn-sm"
                @if (!Auth::check() || Auth::user()->name !== $comment->user_name) disabled @endif onclick="showDeleteModal({{ $comment->id }})">
            Delete
        </button>
    </form>

    <!-- Delete Modal Form -->
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal{{ $comment->id }}" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideDeleteModal({{ $comment->id }})">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this post?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideDeleteModal({{ $comment->id }})">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $comment->id }})">Delete</button>
                </div>
            </div>
        </div>
    </div>

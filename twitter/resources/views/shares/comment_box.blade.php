<div>
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="comment" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>


    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('user.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    <small class="fs-5 fw-bold">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-5 fw-bold">
                    {{ $comment->comment }}
                </p>
            </div>
            @can('delete', $comment)
                <form action="{{ route('idea.comment.destroy', [$comment->idea->id, $comment->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn-sm">X</button>
                </form>
            @endcan

        </div>

    @empty
        <hr>
        <h4 class="text-center">no comment found</h4>
    @endforelse
</div>

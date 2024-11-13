<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                        alt="{{ $idea->user->name }}">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{ route('user.show', $idea->user->id) }}">
                                {{ $idea->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="{{ route('idea.show', $idea->id) }}">View</a>
                    @can('update', $idea)
                        <a class="ms-2" href="{{ route('idea.edit', $idea->id) }}">Edit</a>
                        <form action="{{ route('idea.destroy', $idea->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="ms-1 btn btn-danger btn-sm"> X </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($editting ?? false)
                <form action="{{ route('idea.update', $idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3"> {{ $idea->content }} </textarea>
                        @error('content')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-dark"> update </button>
                    </div>
                </form>
            @else
                <p class="fs-5 fw-bold ">
                    {{ $idea->content }}
                </p>
                <div class="d-flex justify-content-between">
                    @include('shares.like_button')
                    <div>
                        <span class="fs-6 fw-bold text-muted"> <span class="fas fa-clock"> </span>
                            {{ $idea->created_at->diffForHumans() }} </span>
                    </div>
                </div>
                <hr>
                @include('shares.comment_box')
            @endif


        </div>
    </div>
</div>

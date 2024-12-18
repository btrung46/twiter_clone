<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="Mario Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#">{{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                    </p>
                </div>
            </div>

            @can('update', $user)
                <div>
                    <a href="{{ route('user.edit', $user->id) }}">edit</a>
                </div>
            @endcan
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-bold">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followers()->count() }} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart me-1">
                    </span> {{ $user->likes()->count() }} </a>
            </div>
            @if (Auth::user()->isNot($user))
                @if (Auth::user()->follow($user))
                    <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                        @csrf
                        <div class="mt-3">
                            <button class="btn btn-danger btn-sm"> Unfollow </button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('user.follow', $user->id) }}" method="post">
                        @csrf
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>

    </div>
</div>
<hr>

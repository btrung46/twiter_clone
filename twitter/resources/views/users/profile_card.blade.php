<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>

                @if ($edit ?? false)
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <textarea name="name" class="form-control" id="name"> {{ $user->name }} </textarea>
                            @error('name')
                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-dark"> save </button>
                        </div>
                    </form>
                @else
                    <h3 class="card-title mb-0"><a href="#">{{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    </p>
                @endif
                </div>
            </div>
            @if ($user->id === Auth::user()->id && $edit === false)
            <div>
                <a href="{{route('user.edit' , $user -> id)}}">edit</a>
            </div>
            @endif
            @if ($edit === true)
            <div class="">
                <a href="{{route('user.show',$user->id)}}">back</a>
             </div>
            @endif
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            @if ($edit ?? false)
            @else
            <p class="fs-6 fw-light">
                This book is a treatise on the theory of ethics, very popular during the
                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                from a line in section 1.10.32.
            </p>

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->idea()->count()}} </a>
            </div>
            @endif
            @if ($user->id !== Auth::user()->id)
            <div class="mt-3">
                <button class="btn btn-primary btn-sm"> Follow </button>
            </div>
            @endif

        </div>

    </div>
</div>
    <hr>

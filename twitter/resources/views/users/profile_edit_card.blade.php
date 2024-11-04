<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{route('user.update',$user->id)}}" method="post">
            @csrf
            @method('put')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageURL()}}" alt="Mario Avatar">
                <div>

                    <div class="mb-3">
                        <textarea name="name" class="form-control" id="name"> {{ $user->name }} </textarea>
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
            </div>
            @if ($user->id === Auth::user()->id)
                <div>
                    <a href="{{ route('user.show', $user->id) }}">back</a>
                </div>
            @endif
        </div>
        <div class="mt-4">
            <label for="image">Profile picture</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <div class="mb-3">
                <textarea name="bio" class="form-control" id="bio" row="3"> {{$user->bio}}</textarea>
                @error('bio')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-sm"> save </button>
    </form>
    </div>
</div>
<hr>

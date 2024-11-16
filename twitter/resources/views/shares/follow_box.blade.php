<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Suggestions</h5>
    </div>
    <div class="card-body">
        @foreach ($Suggestions as $user)
            @if ($user->id === Auth::user()->id || Auth::user()->follow($user))
                @continue
            @endif
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{route('user.show',$user->id )}}"><img style="width:50px" class="avatar-img rounded-circle"
                            src="{{$user->getImageURL()}}" alt=""></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{route('user.show',$user->id )}}">{{$user->name}}</a>
                    <p class="mb-0 small text-truncate">{{$user->email}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

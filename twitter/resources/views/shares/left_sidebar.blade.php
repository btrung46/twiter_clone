<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{(Request::routeIs('dashboard')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('dashboard')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{(Request::routeIs('feed')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('feed')}}">
                    <span>feed</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('user.show',Auth::user()->id )}}">View Profile </a>
    </div>
</div>

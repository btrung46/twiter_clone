<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{(Request::routeIs('admin.dashboard')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('admin.dashboard')}}">
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="{{(Request::routeIs('admin.users')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('admin.users')}}">
                    <span>User</span></a>
            </li>
            <li class="nav-item">
                <a class="{{(Request::routeIs('admin.ideas')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('admin.ideas')}}">
                    <span>Idea</span></a>
            </li>
            <li class="nav-item">
                <a class="{{(Request::routeIs('admin.comments.index')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{route('admin.comments.index')}}">
                    <span>Comment</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" ></a>
    </div>
</div>

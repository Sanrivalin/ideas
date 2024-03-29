<div class="card overflow-hidden mb-3">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                {{-- To check if the user is on on the current URL: Route::is() --}}
                <a class="{{ (Route::is('dashboard')) ? 'text-white bg-primary rounded ' : ''}} nav-link" href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            <li class="nav-item">
                <a class="{{ (Route::is('terms')) ? 'text-white bg-primary rounded ' : ''}} nav-link" href="{{ url('terms') }}">
                    <span>Terms</span></a>
            </li>

        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('profile')}}">View Profile </a>
    </div>
</div>

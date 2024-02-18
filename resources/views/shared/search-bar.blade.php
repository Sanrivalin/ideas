<div class="card mb-5">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search</h5>
    </div>
    <div class="card-body">
        {{-- It is goint to sent a GET request to the dasboard page --}}
        {{-- with our search parameter at the end of the url as a URL argument --}}
        <form action="{{route('dashboard')}}" method="GET">
            <input value="{{request('search','')}}" name="search" placeholder="Type..." class="form-control w-100" type="text">
            <button class="btn btn-dark mt-2"> Search</button>
        </form>

    </div>
</div>

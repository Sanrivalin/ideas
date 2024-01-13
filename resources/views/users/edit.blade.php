@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            {{-- Left side bar --}}
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            {{-- Including the Alert --}}
            @include('shared.success-message')
                <div class="mt-3">
                    @include('users.shared.user-edit-card')
                </div>
            <hr>
            {{-- For Each Ideas (cards) --}}
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    {{-- Card --}}
                    @include('ideas.shared.idea-card')
                </div>
            @empty
                <p class="text-center my-3">No results found</p>
            @endforelse
    {{-- Adding pagination Button --}}
    <div class="mt-3">
        {{ $ideas->withQueryString()->links() }}
    </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection

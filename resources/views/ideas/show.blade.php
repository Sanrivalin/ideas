@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-12 col-lg-3">
       {{-- Left side bar --}}
       @include('shared.left-sidebar')
    </div>
        <div class="col-12 col-lg-6">
            {{-- Including the Alert --}}
            @include('shared.success-message')
            <hr>
            <div class="mt-3">
            {{-- Idea Card, here is dispalyed--}}
                 @include('ideas.shared.idea-card')
            </div>
        </div>
         {{-- Left right bar --}}
    <div class="col-12 col-lg-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection

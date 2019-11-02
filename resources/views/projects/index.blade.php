@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Projects</h1>
            @forelse ($projects as $project)
                <article></article>
            @empty
                <div class="alert alert-info">
                    {{ __('Sorry, we could not find any projects. Please try again later.') }}
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

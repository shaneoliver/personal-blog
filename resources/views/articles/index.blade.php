@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Articles</h1>
            @forelse ($articles as $article)
                <article>
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->body }}</p>
                </article>
            @empty
                <div class="alert alert-info">
                    {{ __('Sorry, we could not find any articles. Please try again later.') }}
                </div>
            @endforelse
        </div>
        <div class="col-12">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection

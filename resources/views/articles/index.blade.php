@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-10">
            <h1>Articles</h1>
            @forelse ($articles as $article)
                <article>
                    <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
                    <p>By {{ $article->user->name }} on {{ $article->published_at->format('jS M, Y') }}</p>
                    <p>{{ $article->excerpt }}</p>
                </article>
            @empty
                <div class="alert alert-info">
                    {{ __('Sorry, we could not find any articles. Please try again later.') }}
                </div>
            @endforelse
        </div>
        @if ($articles->count() > 0)
            <div class="col-10">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

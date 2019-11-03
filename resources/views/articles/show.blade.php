@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-10">
            <article-component :article="{{ $article }}" published_at="{{ $article->published_at->format('jS M, Y') }}"></article-component>
        </div>
    </div>
</div>
@endsection

@extends("layouts.app")
@section("content")
<div class="container">


    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $article->created_at->diffForHumans() }}

                Category: <b>{{ $article->category->name}}</b>
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <div>
                <a class="btn btn-primary me-2" href="{{ url("/articles") }}">
                    Back
                </a>



                @if ($article->user_id === auth()->user()->id)

                <a class="btn btn-warning me-2" href="{{ url("/articles/edit/$article->id") }}">
                    Edit
                </a>

                <a class="btn btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                    Delete
                </a>
                @endif

            </div>
        </div>
    </div>

    @if(session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- comments-->
    <ul class="list-group">
        <li class="list-group-item active">
            <b>Comments ({{ count($article->comments) }})</b>
        </li>

        @foreach($article->comments as $comment)
        <li class="list-group-item">
            <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end">
            </a>
            {{$comment->content}}
            <div class="small mt-2">
                By <b>{{ $comment->user->name }}</b>,
                {{ $comment->created_at->diffForHumans() }}
            </div>
        </li>
        @endforeach
    </ul>


    @auth
    <!-- add comment -->
    <form class="mt-2" action="{{ url('/comments/add') }}" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
        <input type="submit" value="Add Comment" class="btn btn-secondary">
    </form>
    @endauth

</div>
@endsection
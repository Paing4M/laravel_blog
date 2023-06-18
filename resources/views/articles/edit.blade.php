@extends('layouts.app')
@section('content')
<div class="container">
  <h2 class="text-center">Edit article</h2>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ol>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ol>
  </div>
  @endif

  <form method="post">
    @csrf
    <div class="mb-3">
      <label>Title</label>
      <input value='{{ $data->title }}' type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
      <label>Body</label>
      <textarea name="body" class="form-control">{{ $data->body }}</textarea>
    </div>
    <div class="mb-3">
      <label>Category</label>
      <select class="form-select" name="category_id">
        @foreach($categories as $category)
        <option {{ $data->category_id === $category['id'] ? 'selected' : ''}} value="{{ $category['id'] }}">
          {{ $category['name'] }}
        </option>
        @endforeach
      </select>
    </div>
    <div>
      <a class="btn btn-secondary me-2" href="/articles">Back</a>


      <button type="submit" class="btn btn-primary">Edit Article</button>
    </div>
  </form>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title"  value="{{old('title')}}" placeholder="inserisci titolo">
      
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">content</label>
      <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" {{old('published') ? 'checked' : ''}} id="published"  name="published">
      <label class="form-check-label" for="published">pubblicato</label>
    </div>
    <label for="catgory" class="form-label">Category</label>
    <select name="category_id" id="category" class="form-control">
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
          
      @endforeach
      <option value=""></option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
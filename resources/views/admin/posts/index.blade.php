@extends('layouts.admin')
<div class="container">

<a href="{{route('admin.posts.create')}}" class="btn btn-primary">crea nuovo post</a>
</div>

@section('content')
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"><Title></Title></th>
      <th scope="col">Creation date</th>
      <th scope="col">Modifica</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($posts as $post)
   <tr>
      <th scope="row">2</th>
      <td><a href="{{route('admin.posts.show', $post->id)}}">{{$post->id}}</a></td>
      <td>{{$post->title}}</td>
      <td>{{$post->created_at}}</td>
      <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary" >clicca qui</a></td>
    </tr>
   @endforeach
    
    </tbody>
  </table>
</div>
@endsection
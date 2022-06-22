@extends('layouts.admin')

<a href="{{route('admin.posts.create')}}" class="btn btn-primary">crea nuovo post</a>

@section('content')

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
       
   @endforeach
    <tr>
      <th scope="row">2</th>
      <td><a href="{{route('admin.posts.show,$post->id')}}">{{post->id}}</a></td>
      <td><a href="{{route('admin.posts.show,$post->title')}}">{{post->title}}</a></td>
      <td>{{$post->created_at}}</td>
      <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary" >clicca qui</a></td>
    </tr>
  </tbody>
</table>

    
@endsection
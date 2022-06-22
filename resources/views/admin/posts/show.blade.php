@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{$post->title}}</h1>
    <small>{{$post->created_at}}</small>
    <p>{{$post->content}}</p>
    <h5>pubblicato:{{$post->published}}</h5>
</div>
@endsection
@extends('loyats.app')
@section('content')
<div>
    <a href="{{route('post.create')}}" class = "btn btn-primary mb-3">>Добавить пост</a>
</div>

<div>
    @foreach($posts as $post)
    <div><a href="{{route('post.show', $post->id)}}"> {{$post->id}}.{{$post->title}}</a> </div>
    @endforeach
</div>  
@endsection
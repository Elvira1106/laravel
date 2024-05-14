@extends('loyats.app')
@section('content')
<div>
    <div> {{$post->id}}.{{$post->title}} </div>
    <div>{{$post->post_content}} </div>
</div> 
<div>
    <a href="{{ route('post.edit',$post->id)}}" class = "btn btn-primary mb-3" >Edit</a>
</div>
<div>
    <form action ="{{route('post.destroy',$post->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class ="btn btn-danger mb-3">
    </form>
</div>
<div>
    <a href="{{ route('post.index')}}" class = "btn btn-primary mb-3">Back</a>
</div>
@endsection 
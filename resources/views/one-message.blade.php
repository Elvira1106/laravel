@extends('loyats.app')

@section('title-block')
{{$data->subject}}
@endsection

@section('content')
<h1>{{$data->subject}}</h1>
<div class="alert alert-info">
    <p>{{$data->email}} - {{$data->name}} </p>
    <p>{{$data->message}}</p>
    <p><small>{{$data->created_at}}</small></p>
    <a href="{{route('contact.edit', $data->id)}}"><button class ="btn btn-primary">Редактировать</button></a>
<p> 
    <form action="{{route('contact.destroy', $data->id)}}" method="post">
    @csrf
    @method('delete')
  <button class ="btn btn-danger">Удалить</button></a>
    </form>
    </p>
</div>
@endsection

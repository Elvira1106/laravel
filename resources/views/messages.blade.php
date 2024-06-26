@extends('loyats.app')

@section('title-block')
Все сообщения
@endsection

@section('content')
<h1>Все сообщения</h1>
@foreach($data as $el)

<div class="alert alert-info">
    <h3>{{$el->subject}}</h3>
    <p>{{$el->email}}</p>
    <p><small>{{$el->created_at}}</small></p>
    @can('view', auth()->user())
    <a href="{{route('contact.show', $el->id)}}"><button class ="btn btn-warning">Детальное</button></a>
    @endcan
</div>
@endforeach
<p>Хочется есть на самом деле</p>
@endsection

@section('aside')
@parent
<p>Радмир башкир</p>
@endsection
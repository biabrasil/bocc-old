@extends('layouts.app')

@section('title', 'Publicações')

@section('content')
@foreach($posts as $post)
<div>{{$post['title']}}</div>
@endforeach
@endsection

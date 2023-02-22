@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if($post['is_new'])
<div>Nova publicação:</div>

@else
<div>Publicação é mais antiga.</div>

@endif

@unless($post['is_new'])
<div>É uma publicação antiga.</div>
@endunless

<h1>{{$post['title']}}</h1> 
<p>{{$post['content']}}</p>

@isset($post['has_comments'])
<div>A publicação tem comentários.</div>

@endisset

@endsection

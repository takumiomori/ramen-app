@extends('toppage')

@section('title','口コミ投稿')

@section('content')
@if(isset($msg))
<div class="alert alert-primary" role="alert">{{$msg}}</div>
@endif
@endsection

@section('footer')
copyright 2023 Omori.
@endsection
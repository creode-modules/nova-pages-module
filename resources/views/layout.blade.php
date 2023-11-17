@extends('layout')
@section('content')
    @foreach($content as $contentBlock)
        @include($contentBlock['view'], $contentBlock['attributes'])
    @endforeach
@endsection

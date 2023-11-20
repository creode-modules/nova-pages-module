@extends('layout')
@section('content')
    @foreach($content as $pageContentBlock)
        @include($pageContentBlock->view(), $pageContentBlock->attributes())
    @endforeach
@endsection

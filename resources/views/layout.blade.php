@extends(config('pages.layout_path'))
@section(config('pages.content_section'))
    @foreach($content as $pageContentBlock)
        @include($pageContentBlock->view(), $pageContentBlock->attributes())
    @endforeach
@endsection

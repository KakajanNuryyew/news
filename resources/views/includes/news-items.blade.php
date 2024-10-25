@foreach($news as $new)

    <a class="d-block news-item" href="{{ route('news.show', ['id' => $new->id]) }}">{{$new->name}}</a>

@endforeach

@if ($news->lastPage() > 1)
    <div class="d-flex justify-content-center">
        {{ $news->links() }}
    </div>
@endif
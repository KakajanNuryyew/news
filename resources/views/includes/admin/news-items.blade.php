<table class="table table-hover align-middle">    

    <thead>
        <tr>
            <th>#</th>
            <th>Фото</th>
            <th>Названия</th>
            <th>Автор</th>
            <th class="created-at">Дата создание</th>
            <th class="actions">Процедуры</th>
        </tr>
    </thead>
    <tbody>

    @forelse($news as $new)
        <tr>
            <td>{{ $news->total()-(($news->currentPage()-1)*$news->perPage()+$loop->iteration-1) }}</td>
            <td>
                <img src="{{route('images.show', ['name' => $new->image])}}" alt="" height="60px" width="80px" style="object-fit: cover">
            </td>
            <td class="text-center">{{ $new->name }}</td>
            <td>{{$new->author}}</td>
            <td>
                {{$new->created_at}}
            </td>
            <td>
                <a href="{{route('admin.news.edit', ['id' => $new->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title=""><i class="fa-solid fa-pencil" aria-hidden="true"></i></a>
                <a href="{{route('admin.news.destroy', ['id' => $new->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title=""><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td> 
        </tr>
    @empty
        <tr>
            <td colspan="6" class="border-bottom-0 text-center text-danger p-4">Информация не найдена</th>
        </tr>                                        
    @endforelse

    </tbody>
</table>



@if ($news->lastPage() > 1)
    <div class="d-flex justify-content-center">
        {{ $news->links() }}
    </div>
@endif

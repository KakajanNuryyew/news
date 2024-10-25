<table class="table table-hover align-middle">    

    <thead>
        <tr>
            <th>#</th>
            <th>Логин</th>
            <th>Права доступа</th>
            <th class="created-at">Дата создание</th>
            <th class="actions">Процедуры</th>
        </tr>
    </thead>
    <tbody>

    @forelse($users as $user)
        <tr>
            <td>{{ $users->total()-(($users->currentPage()-1)*$users->perPage()+$loop->iteration-1) }}</td>
            <td class="text-center">{{ $user->login }}</td>
            <td>{{$user->getRoleNames()}}</td>
            <td>
                {{$user->created_at}}
            </td>
            <td>
                <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title=""><i class="fa-solid fa-pencil" aria-hidden="true"></i></a>
                <a href="{{route('admin.users.destroy', ['id' => $user->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title=""><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td> 
        </tr>
    @empty
        <tr>
            <td colspan="6" class="border-bottom-0 text-center text-danger p-4">Информация не найдена</th>
        </tr>                                        
    @endforelse

    </tbody>
</table>



@if ($users->lastPage() > 1)
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endif

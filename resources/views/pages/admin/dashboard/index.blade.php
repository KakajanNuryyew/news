@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>{{ Auth::user()->login }} | Админ панел</h4>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('includes.admin.dashboard-links')
                @if (session('success'))
                    <div class="mt-4 alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-4 alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-6 border p-4">
                        <h5 class="fw-bold">
                            Топ 5 новостей
                        </h5>
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Названия</th>
                                        <th>Автор</th>
                                        <th>Количество просмотров</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($topNews as $new)
                                        <tr>
                                            <td>{{$new->name}}</td>
                                            <td>{{$new->author}}</td>
                                            <td>{{$new->view_count}}</td>
                                        </tr>
                                     @empty
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 text-center text-danger p-4">Информация не найдена</th>
                                        </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                    <div class="col-md-6 border p-4">
                        <h5 class="fw-bold">
                            Топ авторов
                        </h5>

                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Автор</th>
                                    <th>Количество просмотров</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topAuthors as $author)
                                    <tr>
                                        <td>{{$author->author}}</td>
                                        <td>{{$author->view_count}}</td>
                                    </tr>
                                 @empty
                                    <tr>
                                        <td colspan="3" class="border-bottom-0 text-center text-danger p-4">Информация не найдена</th>
                                    </tr>    
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection

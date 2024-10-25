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

                <form class="register" method="POST" action="{{route('admin.users.update', ['id' => $user->id])}}">
                    @csrf

                    <div class="my-4 mx-0">
                        <label for="login" class="form-label">Логин</label>
                        <input id="login" type="input"
                            class="form-control rounded-0 @error('login') is-invalid @enderror" name="login" required
                            autocomplete="login" value="{{$user->login}}">

                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="password" class="form-label">Пароль</label>
                        <input id="password" type="password"
                            class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="password-confirm" class="form-label">Повторить пароль</label>
                        <input id="password-confirm" type="password"
                            class="form-control rounded-0 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required
                            autocomplete="password_confirmation">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="" class="form-label d-block">Права доступа</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="admin" value="{{\App\Models\User::ADMIN}}" {{$roles->contains('admin') ? 'checked' : ''}} >
                            <label class="form-check-label" for="admin">Админ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="content manager" value="{{\App\Models\User::CONTENT_MANAGER}}" {{$roles->contains('content manager') ? 'checked' : ''}}>
                            <label class="form-check-label" for="content manager">Контент менеджер</label>
                        </div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>




                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary rounded-0">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>

                {{-- <form class="register" method="POST" action="{{ route('admin.news.update', ['id' => $new->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="my-4 mx-0">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="input"
                            class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" required
                            autocomplete="name" value="{{$new->name}}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="description" class="form-label">Описание</label>
                        <textarea id="description" rows="5" cols="20" class="form-control" name="description" required>{{$new->description}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                      <div class="mb-4 mx-0">
                        <label class="form-label"><i class="far fa-file-image ms-2 me-2" aria-hidden="true"></i>Фото</label>
                        <div class="mx-auto mb-3">
                            <img id="image" alt="{{ $new->name }}" src="{{ route('images.show', ['name' => $new->image]) }}" width="100%" height="200px" style="object-fit: contain"/>
                        </div>
                        
                        <input id="image" class="form-control rounded-0 @error('image') is-invalid @enderror" type="file" name="image" onchange="readURLtm(this);" >

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary rounded-0">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form> --}}

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        function readURLtm(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

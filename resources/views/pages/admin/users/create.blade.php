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

                <form class="register" method="POST" action="{{route('admin.users.store')}}">
                    @csrf

                    <div class="my-4 mx-0">
                        <label for="login" class="form-label">Логин</label>
                        <input id="login" type="input"
                            class="form-control rounded-0 @error('login') is-invalid @enderror" name="login" required
                            autocomplete="login">

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
                            <input class="form-check-input" type="radio" name="role" id="admin" value="{{\App\Models\User::ADMIN}}">
                            <label class="form-check-label" for="admin">Админ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="content manager" value="{{\App\Models\User::CONTENT_MANAGER}}" checked>
                            <label class="form-check-label" for="content manager">Контент менеджер</label>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary rounded-0">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

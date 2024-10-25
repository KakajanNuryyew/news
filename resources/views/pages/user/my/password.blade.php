@extends('layouts.user')

@section('content')
<div class="container">
    <h4>{{Auth::user()->login}}</h4>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.profile-links')
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
            <form class="register" method="POST" action="{{route('my.password.update')}}">
                @csrf

                <div class="my-4 mx-0">
                    <label for="password" class="form-label">Пароль<span
                            class="text-danger">*</span></label>
                    <input id="password" type="password"
                        class="form-control rounded-0 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 mx-0">
                    <label for="password-confirm" class="form-label">Повторить пароль<span
                            class="text-danger">*</span></label>
                    <input id="password-confirm" type="password" class="form-control rounded-0"
                        name="password_confirmation" required autocomplete="new-password">
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

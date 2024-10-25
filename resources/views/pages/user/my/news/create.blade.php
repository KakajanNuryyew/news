@extends('layouts.user')

@section('content')
    <div class="container">
        <h4>{{ Auth::user()->login }}</h4>
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

                <form class="register" method="POST" action="{{ route('my.news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="my-4 mx-0">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="input"
                            class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" required
                            autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="description" class="form-label">Описание</label>
                        <textarea id="description" rows="5" cols="20" class="form-control" name="description" required></textarea>
                    </div>

                    <div class="mb-4 mx-0">
                        <label for="image" class="form-label">Фото</label> <br />
                        <input type="file" id="image" name="image" required/>
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

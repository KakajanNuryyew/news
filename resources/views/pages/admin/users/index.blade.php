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
                <div class="d-flex justify-content-end">

                    <a class="btn btn-success" href="{{route('admin.users.create')}}">Добавить пользователя</a>
                </div>
                <div id="usersData">
                    @include('includes.admin.user-items')
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/admin/users/by-page?page=" + page,
                    success: function(data) {
                        $('#usersData').html(data);
                    }
                });
            }

        });
    </script>
@endsection

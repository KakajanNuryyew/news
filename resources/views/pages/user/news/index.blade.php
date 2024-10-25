@extends('layouts.user')

@section('content')
    <div class="container news-page">
        <div class="row justify-content-center">
            <div class="col-md-12" id="newsData">
                @include('includes.news-items')
            </div>
        </div>

    </div>
@endsection

@section('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/news/by-page?page=" + page,
                    success: function(data) {
                        $('#newsData').html(data);
                    }
                });
            }

        });
    </script>
@endsection

<a class="btn btn-info {{Route::currentRouteName() == 'admin.dashboard' ? 'fw-bold' : ''}}" href="{{route('admin.dashboard')}}">Дашборд</a>
<a class="btn btn-danger {{Route::currentRouteName() == 'admin.news' ? 'fw-bold' : ''}}" href="{{route('admin.news')}}">Новости</a>
<a class="btn btn-warning {{Route::currentRouteName() == 'admin.users' ? 'fw-bold' : ''}}" href="{{route('admin.users')}}">Пользователи</a>

<a class="btn btn-secondary" href="{{ route('logout') }}"
    onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 ВЫЙТИ
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<hr />
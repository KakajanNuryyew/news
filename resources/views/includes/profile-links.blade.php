<a class="btn btn-danger" href="{{route('my.password')}}">изменить пароль</a>
<a class="btn btn-warning" href="{{route('my.news.create')}}">добавить новость </a>

<a class="btn btn-secondary" href="{{ route('logout') }}"
    onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 ВЫЙТИ
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@role('admin')
    <a class="btn btn-outline-dark ms-4" href="{{route('admin.dashboard')}}">Админ панель</a>
@endrole

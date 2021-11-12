<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li style="margin-right:10px;">
            Xos Geldiniz: <b>{{ Auth()->user()->name }}</b>&nbsp; |
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout_form').submit();">Çıxış</a>
            <form action="{{ route('logout') }}" method="POST" id="logout_form">
                @csrf
            </form>
        </li>
    </ul>
</nav>

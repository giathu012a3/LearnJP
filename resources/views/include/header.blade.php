<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

        </ul>
        <ul class="navbar-nav mt-2 mt-lg-0">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ Auth()->user()->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('profile') }}">Thông tin tài khoản</a>
                        <a class="dropdown-item" href="{{ route('changePassword') }}">Đổi mật khẩu</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                    </div>
                </li>
           @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Đăng kí</a>
                </li>
            @endauth

        </ul>
    </div>
</nav>
<div style="margin-top: 46px"></div>

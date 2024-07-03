@extends('layout')
@section('title', 'Login')
@section('content')
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }
    </style>
    <section class="vh-100 gradient-custom-3">

        <div class="container py-5 h-100">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }} </div>
                    @endforeach
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger"> {{ session('error') }} </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success"> {{ session('success') }}</div>
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="h-100 col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('/img/banner.jpg') }}" alt="login form" class="img-fluid h-100 "
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">

                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập
                                        </h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" >Số điện thoại</label>
                                            <input type="number"  class="form-control form-control-lg"
                                                name="phone" />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" >Mật khẩu</label>
                                            <input type="password"  class="form-control form-control-lg"
                                                name="password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn không có tài khoản <a
                                                href="{{ route('registration') }}" style="color: #393f81;">Tạo tài khoản ở đây</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

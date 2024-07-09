@extends('layout')
@section('title', 'Đăng kí')
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

        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
    <div class="<div class="container-fluid">

        <section class=" bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');background-size: cover">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <div class="mt-5">
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

                                        @if (session()->has('seccess'))
                                            <div class="alert alert-success"> {{ session('success') }}</div>
                                        @endif
                                    </div>
                                    <h2 class="text-uppercase text-center mb-5">Tạo tài khoản</h2>
                                    <form action="{{ route('registration.post') }}" method="POST">
                                        @csrf
                                        <label class="form-label" for="form3Example1cg">Họ và tên</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                                name="name" />
                                        </div>
                                        <label class="form-label" for="form3Example1cg">Số điện thoại</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="phone" id="form3Example1cg" class="form-control form-control-lg"
                                                name="phone" />
                                        </div>
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                                name="email" />
                                        </div>
                                        {{-- <label class="form-label" for="form3Example3cg">Địa chỉ</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                                name="address" />
                                        </div>
                                        <label class="form-label" for="form3Example3cg">Nghề nghiệp</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                                name="occupation" />
                                        </div>
                                        <label class="form-label" for="form3Example3cg">Sinh Nhật</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="date" id="form3Example3cg" class="form-control form-control-lg"
                                                name="birthday" />
                                        </div>
                                        <label class="form-label" for="form3Example3cg">Trình độ tiếng Nhật</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                                name="jplanguageproficiency" />
                                        </div> --}}
                                        <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                                name="password" />
                                        </div>

                                        <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form3Example4cdg"
                                                class="form-control form-control-lg" name="password_confirmation" />
                                        </div>

                                        {{-- <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3cg" />
                                            <label class="form-check-label" for="form2Example3g">
                                                Tôi đồng ý tất cả các tuyên bố trong <a href="#!"
                                                    class="text-body"><u>Điều khoản dịch vụ</u></a>
                                            </label>
                                        </div> --}}

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng
                                                kí</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Đã có tài khoản? <a
                                                href="{{ route('login') }}" class="fw-bold text-body"><u>Đăng nhập ở đây</u></a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

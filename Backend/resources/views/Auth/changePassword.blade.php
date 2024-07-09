@extends('layout')
@section('title', 'Thông tin cá nhân')
@include('include.header')
@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="card h-100">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="row gutters">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label for="current_password">Mật Khẩu hiện tại</label>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label for="fullName">Mật khẩu mới</label>
                                    <input id="new_password" type="password" class="form-control" type="password"
                                        name="new_password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label for="fullName">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        name="new_password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        </div>

                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-right">
                                    <a href="{{ route('profile') }}" class="btn btn-secondary">Trở về</a>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Cập
                                        nhật</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

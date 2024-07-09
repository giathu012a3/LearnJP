@extends('layout')
@section('title', 'Thông tin cá nhân')
@include('include.header')
@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile text-center">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h3 class="user-name"> {{ Auth()->user()->name }}</h3>
                                <h6 class="user-email"> {{ Auth()->user()->email }}</h6>
                                <h6 class="user-email">SĐT: {{ Auth()->user()->phone }}</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <form action="{{ route('editProfile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Thông tin cơ bản</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Họ và tên</label>
                                        <input type="text" class="form-control" id="fullName" name="name"
                                            value="{{ Auth()->user()->name }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Các thông tin khác</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Địa chỉ</label>
                                        <input type="name" class="form-control" id="address" name="address"
                                            value="{{ Auth()->user()->address }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy"> Nghề nghiệp</label>
                                        <input type="name" class="form-control" id="occupation" name="occupation" value="{{ Auth()->user()->occupation }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="sTate">Sinh Nhật</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ Auth()->user()->birthday }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="zIp">Trình độ tiếng Nhật</label>
                                        <input type="text" class="form-control" id="jplanguageproficiency" name="jplanguageproficiency" value="{{ Auth()->user()->jplanguageproficiency }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a href="{{ route('profile') }}" class="btn btn-secondary">Trở về</a>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

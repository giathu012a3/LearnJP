@extends('layout')
@section('title', 'Thông tin cá nhân')
@include('include.header')
@section('content') 
<section style="background-color: #eee;">
    <div class="container py-5">
      {{-- <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div> --}}
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"> {{ Auth()->user()->name }}</h5>
              {{-- <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
              <div class="d-flex justify-content-center mb-2">
                <a href="{{ route('editProfile') }}" class="btn btn-primary">Cập Nhật</a>
                {{-- <a href="{{ route('') }}"></a> --}}
                {{-- <button  type="button" data-mdb-button-init data-mdb-ripple-init class=""></button> --}}
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Đổi mật khẩu</button>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->phone }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Sinh nhật</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->birthday }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Địa chỉ</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->address }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nghề nghiệp</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->occupation }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Trình độ tiếng nhật</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> {{ Auth()->user()->jplanguageproficiency }}</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection

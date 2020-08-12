@extends('home.home')
@section('content')
    <div class="title m-b-md">
        Trang quản lý người dùng
    </div>

    <div class="links">
        <a href="{{ route('form.login') }}">
            <button type="button" class="btn btn-outline-primary">Đăng Nhập</button>
        </a>
    </div>
@endsection


@extends('layouts.home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <a class="btn btn-success mt-4 " href="{{route('cities.create')}}">Thêm mới</a>
    <div class="card mt-4">
            <div class="col-12">
                <h1>Danh Sách Tỉnh Thành</h1>
            </div>
            <div class="col-12">
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($cities) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                            <td><a href="{{route('cities.edit',$city->id)}}">sửa</a></td>
                            <td><a href="{{route('cities.delete',$city->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>


@endsection

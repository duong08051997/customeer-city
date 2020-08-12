@extends('home')
@section('title', 'Cập nhật thông tin khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Chỉnh sửa thông tin khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Ảnh khách hàng</label>
                        <input type="file" class="form-control" name="image" value="{{ $customer->image }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="date" value="{{ $customer->date }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tỉnh thành</label>
                        <select class="form-control" name="city_id">
                            @foreach($cities as $city)
                                <option
                                    @if($customer->city_id == $city->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection

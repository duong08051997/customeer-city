@extends('layouts.home')
@section('title','Thêm mới khách hàng')
@section('content')


        <div class="col-12">
            <h1>Thêm mới khách hàng</h1>
        </div>
<form method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->all())
        <div class="    alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error! </strong> Thao tác thêm mới không thành công!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="form-group">
        <label>Ảnh khách hàng</label>
        <input type="file" class="form-control  @if($errors->has('image'))border border-danger @endif" name="image" value="{{old('image')}}">
        @if($errors->has('image'))
            <p class="text-danger">{{$errors->first('image')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Tên khách hàng</label>
        <input type="text" class="form-control @if($errors->has('name'))border border-danger @endif" name="name" placeholder="tên khách hàng" value="{{old('name')}}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif

    </div>
    <div class="form-group">
        <label >Email khách hàng</label>
        <input type="email" class="form-control @if($errors->has('email'))border border-danger @endif" name="email" placeholder="xxx@gmail.com" value="{{old('email')}}">
    </div>
    @if($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
    <div class="form-group">
        <label >Ngày sinh</label>
        <input type="date" class="form-control" name="date" value="{{old('date')}}">
        @if($errors->has('date'))
            <p class="text-danger">{{ $errors->first('date') }}</p>
        @endif

    </div>
    <div class="form-group">
        <label>Tỉnh thành</label>
        <select class="form-control" name="city_id">
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

</form>
@endsection

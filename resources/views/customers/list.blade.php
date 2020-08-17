@extends('home')
@section('title','danh sach khach hang')
@section('content')
    <a href="{{route('customers.create')}}"  class="btn btn-success mt-4">Thêm mới</a>
    <div class="card mt-4">
        <div class="col-12">
            <h1>Danh Sách Khách Hàng</h1>
        </div>
        <form action="{{ route('customers.filterByCity') }}" id="search-city" method="get">
            @csrf
            <select class="custom-select " name="city_id" style="width: auto ;margin-left: 10px" id="select-city">
                <option value="">Chọn tỉnh thành</option>
                @foreach($cities as $city)
                    @if(isset($cityFilter))
                        @if($city->id == $cityFilter->id)
                            <option value="{{$city->id}}" selected>{{ $city->name }}</option>
                        @else
                            <option value="{{$city->id}}">{{ $city->name }}</option>
                        @endif

                    @else
                        <option value="{{$city->id}}">{{ $city->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </form>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif

            @if(isset($totalCustomerFilter))
                <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                </span>
            @endif

            @if(isset($cityFilter))
                <div class="pl-5">
                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                       {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Ảnh khách hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">email</th>
                    <th scope="col">Thành phố</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="user-list">
                @forelse($customers as $key => $customer)
                    <tr class="customer-item" id="customer-{{$customer->id}}">
                        <th scope="row">{{++$key}}</th>
                        <td id="search-img"><img src="{{asset('storage/'.$customer->image)}}"  alt="khong co anh" width="50" height="50">
                        </td>
                        <td id="search-name">{{$customer->name}}</td>
                        <td>{{$customer->date}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->city->name}}</td>
                        <td><a href="{{route('customers.edit',$customer->id)}}">sửa</a></td>
                        <td><a href="" class="text-danger delete-customer" data-id="{{$customer->id}}">xóa</a></td>
                    </tr>
                @empty
                    <tr>
                        <td>Không có dữ liệu khách hàng</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div id="customer-list"><br>
        </div>
        {{ $customers->appends(request()->query()) }}
    </div>

@endsection

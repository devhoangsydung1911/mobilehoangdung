@extends('adminlte.dashboard')
@section('title', 'Order')
@section('dashboard')
    <div class="">
        <!-- Title -->
        <h2 class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]">
            Đơn hàng
        </h2>
        <!-- Row Table -->
        <div class="mt-2 border-[0.25px] ">
            <table class="table-auto w-full text-center text-base">
                <thead class="border-[1px] text-lg">
                    <tr>
                        <th class="w-[60px]">STT</th>
                        <th>Tên</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Tiện ích</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b-[1px] text-left py-[12px]">
                            <td>1</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="#">
                                    <button class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1">
                                        Xem chi tiết
                                    </button>
                                </a>
                                <a href="">
                                    <button class="px-[10px] py-[5px] bg-red-500 text-white rounded-md">
                                        Xóa
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

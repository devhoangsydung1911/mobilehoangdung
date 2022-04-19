@extends('adminlte.dashboard')

@section('dashboard')
    <section>
        <div class="">
            <div class="">
                <!-- Title -->
                <h2 class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]">
                    Giỏ hàng
                </h2>
                <!-- Row Table -->
                <div class="mt-3 border-[0.25px]">
                    <table class="table-fixed w-full text-center text-base">
                        <thead class="border-[1px]">
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 object-cover">
                                    <img src="assets/images/product/pr1.jpg" alt="" class="w-[70px] m-auto" />
                                </td>
                                <td>iPhone 12</td>
                                <td>33 990 000</td>
                                <td>
                                    <span class="mx-4">Số</span>
                                </td>
                                <td>100 000 000</td>
                                <td>100 000 000</td>
                                <td>
                                    <a href="">
                                        <button
                                            class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1">Edit</button>
                                    </a>
                                    <a href="">
                                        <button class="px-[10px] py-[5px] bg-red-500 text-white rounded-md">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex mt-3 justify-end">
                    <div class="uppercase font-bold px-4 py-2 text-right">
                        <p class="text-[30px] leading-[29px]">Tổng tiền</p>
                        <p class="mt-3 text-xl">Thành tiền: <span>33 990 000</span></p>
                        <button
                            class="uppercase inline-block border rounded-3xl bg-gradient-to-r from-green-500 to-blue-500 hover:from-yellow-500 hover:to-pink-500 text-white mt-3 px-4 py-2 font-bold text-[20px] leading-[29px]">
                            Thanh Toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

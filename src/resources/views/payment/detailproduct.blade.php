@extends('payment.formpayment')

@section('payment')
    <!-- PRODUCT DETAIL and Evaluate -->
    <section>
        <div class="layout-container">
            <div class="mt-[40px]">
                <!-- Title -->
                <h2 class="uppercase text-center  mb-5  text-gray33 font-bold text-[20px] leading-[29px]">
                    Thanh Toán
                </h2>
                <!-- Row Table -->
                <div class="mt-3 border-[0.25px]">
                    <table class="table-fixed w-full text-center text-lg">
                        <thead class="border-2">
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 object-cover"><img src="./assets/images/product/pr1.jpg" alt=""
                                        class="w-[150px]"></td>
                                <td>ipPhone 12</td>
                                <td>33 990 000</td>
                                <td><span>5</span></td>
                                <td>100 000 000</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="flex mt-3 justify-end">
                    <div class="uppercase font-bold px-4 py-2 text-right">
                        <p class="text-[30px] leading-[29px]">Tổng tiền</p>
                        <p class="mt-3 text-xl">Thành tiền: <span>100 000 000</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT DETAIL and Evaluate -->
@endsection

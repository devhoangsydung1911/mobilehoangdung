<section id="pdf">
    <div class="mt-[60px]">
        <div class="layout-container">
            <!-- Title -->
            <h2 class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]">
                Chi tiết đơn hàng
            </h2>
            <div>
                <h2 class="uppercase mt-3 mb-1 text-gray33 font-bold text-[20px] leading-[29px]">
                    Thông tin người mua
                </h2>
                <table class="border-[0.5px] table-auto w-full text-center text-base">
                    <thead class="border-[0.5px] text-lg">
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b-[1px]">
                            <td>{{ $user->user->username }}</td>
                            <td>{{ $user->user->email }}</td>
                            <td>
                                <span class="mx-4">{{ $user->user->phone_number }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Row Table -->
            <div class="mt-3">
                <h2 class="uppercase mb-1 text-gray33 font-bold text-[20px] leading-[29px]">
                    Thông tin người nhận
                </h2>
                <table class="border-[0.5px] table-auto w-full text-center text-base">
                    <thead class="border-[0.5px] text-lg">
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Ghi chú</th>
                            <th>Phương thức thanh toán</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b-[1px] h-[50px]">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="mx-4">{{ $user->phone_number }}</span>
                            </td>
                            <td>{{ $user->note }}</td>
                            <td>Tiền mặt</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <h2 class="uppercase mb-1 text-gray33 font-bold text-[20px] leading-[29px]">
                    Sản phẩm đã đặt
                </h2>
                <table class="border-[0.5px] table-auto w-full text-center text-base">
                    <thead class="border-[0.5px] text-lg">
                        <tr>
                            <th class="w-[60px]">STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum = 1; ?>
                        @foreach ($finalData as $data)
                            <tr class="border-b-[1px]">
                                <td>{{ $sum++ }}</td>
                                <td>{{ $data['title'] }}</td>
                                <td>{{ $data['price'] }}</td>
                                <td>
                                    <span class="mx-4">{{ $data['quantity'] }}</span>
                                </td>
                                <td>{{ $data['total_money'] }}</td>
                                <td>{{ $data['created'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

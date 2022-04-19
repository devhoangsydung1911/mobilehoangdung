@extends('adminlte.dashboard')
@section('title', 'Danh sách tài khoản')
@section('dashboard')
    <section>
        <div class="mt-[60px]">
            <div class="">
                <!-- Title -->
                <h2 class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]">
                    Danh sách tài khoản
                </h2>
                <!-- Row Table -->
                <div class="mt-2 border-[0.25px]">
                    <table class="table-auto w-full text-center text-base">
                        <thead class="border-[1px] text-lg">
                            <tr>
                                <th class="w-[60px]">STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>T/g tạo tài khoản</th>
                                <th>Trạng thái hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum = 0; ?>
                            @foreach ($users as $user)
                                <tr class="border-b-[1px] py-[12px]">
                                    <td> <?php echo $sum += 1; ?> </td>
                                    <td> {{ $user->username }} </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <router-link :to="{ name: 'orderdetail' }">
                                            <button class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1">
                                                Xem chi tiết
                                            </button>
                                        </router-link>
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
        </div>
    </section>
@endsection

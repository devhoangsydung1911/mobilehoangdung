@extends('adminlte.dashboard')
@section('title', 'Product')
@section('dashboard')
    <section>
        <div class="">
            <div class="">
                <!-- Title -->
                <h2 class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]">
                    Tất cả sản phẩm
                </h2>
                <form class="flex items-center">
                    <p class="inline-block min-w-[200px]">Tìm kiếm theo tên: </p>
                    <input type="text" class="border rounded-lg px-3 py-1 flex-1 mr-[150px]">
                    <button type="submit" style="margin:0 auto"
                        class="px-[10px] inline-block w-[200px]  py-[5px] bg-green-500 text-white rounded-md mr-1">
                        Tìm kiếm
                    </button>
                </form>
                <div class="bg-none">
                    <p class="inline-block">Hiển thị theo danh mục sản phẩm:</p>
                    <select
                        class="mt-3  font-semibold inline-block w-[400px] p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                        name="categories_id" id="">
                        <option>----- Chọn danh mục cho sản phẩm -----</option>
                        {{-- @foreach ($listCategory ?? '' as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>
                <!-- Row Table -->
                <div class="mt-3 border-[0.25px]">
                    <table class="table-auto w-full text-center text-base ">
                        <thead class="border-[1px] text-lg">
                            <tr>
                                <th class="w-[60px]">STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Mô tả Sản Phẩm</th>
                                <th>Giảm giá</th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum = 0; ?>
                            @foreach ($allProduct as $item)
                                <tr class="border-b-[1px]">
                                    <td>
                                        <?php echo $sum += 1; ?>
                                    </td>
                                    <td class="p-2 ">
                                        <img src="{{ asset('uploads/products') . '/' . $item->thumbnail }}" alt=""
                                            class="w-[70px] m-auto object-cover" />
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>{{ $item->discount }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->categories->name }}</td>
                                    <td>
                                        <a href="{{ route('edit', ['id' => $item->id]) }}">
                                            <button
                                                class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1">Edit</button>
                                        </a>
                                        <a href="{{ route('deleteproduct', $item->id) }}">
                                            <button
                                                class="px-[10px] py-[5px] bg-red-500 text-white rounded-md">Delete</button>
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

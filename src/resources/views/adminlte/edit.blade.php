@extends('adminlte.dashboard')
@section('title', 'Edit')
@section('dashboard')
    <div>
        <div class="mt-[50px] text-lg">
            <p class="uppercase text-center py-2 text-gray33 font-bold  leading-[29px]">
                Cập nhật sản phẩm
            </p>
            <div>
                <div>
                    <form action="{{ route('updateproduct', ['id' => $editProduct->id]) }}"
                        class="flex flex-col justify-between gap-y-7 flex-wrap" enctype="multipart/form-data" method="POST">
                        @csrf
                        <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Tên sản phẩm: </p>
                            <input type="text" name="title" value="{{ $editProduct->title }}"
                                class="border rounded-lg px-3 py-1 flex-1">
                        </label>
                        <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Miêu tả sản phẩm: </p>
                            {{-- <input type="text" class="border rounded-lg px-3 py-2 flex-1"> --}}
                            <textarea name="desc" id="" cols="30" rows="4"
                                class="border rounded-lg px-3 py-2 flex-1">{{ $editProduct->desc }}</textarea>
                        </label>
                        <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Giá sản phẩm: </p>
                            <input type="number" name="price" value="{{ $editProduct->price }}"
                                class="border rounded-lg px-3 py-1 flex-1">
                        </label>
                        <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Giá sau khi giảm: </p>
                            <input type="number" name="discount" value="{{ $editProduct->discount }}"
                                class="border rounded-lg px-3 py-1 flex-1">
                        </label>
                        <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Ảnh đại diện sản phẩm: </p>
                            <input type="file" name="thumbnail"
                                value="{{ asset('uploads/products') . '/' . $editProduct->thumbnail }}"
                                class="border rounded-lg px-3 py-1 flex-1" accept="image/*" />
                        </label>
                        <img src="{{ asset('uploads/products') . '/' . $editProduct->thumbnail }}" alt=""
                            class="w-[70px] m-auto object-cover" />
                        {{-- <label for="" class="flex items-center">
                            <p class="inline-block min-w-[230px]">Ảnh sản phẩm: </p>
                            <input type="file" name="galery[]" class="border rounded-lg px-3 py-1 flex-1" accept="image/*"
                                multiple>
                        </label> --}}

                        <div class="bg-none">
                            <p class="inline-block">Thuộc danh mục sản phẩm:</p>
                            <select
                                class="mt-3  font-semibold inline-block w-[400px] p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                                name="categories_id" id="">
                                <option>----- Chọn danh mục cho sản phẩm -----</option>
                                @foreach ($listCate as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $editProduct->categories_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" style="margin:0 auto"
                            class="px-[10px] inline-block w-[500px]  py-[5px] bg-green-500 text-white rounded-md mr-1">
                            Cập nhật sản phẩm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

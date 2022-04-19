<template>
  <section>
    <div class="layout-container">
      <div class="flex justify-between my-[20px]">
        <!-- BANNER - LEFT -->
        <div class="max-w-[840px] w-full pr-[10px]">
          <!-- Left - Top -->
          <div class="h-[300px] autoplay">
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider1.png'"
              alt=""
            />
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider2.png'"
              alt=""
            />
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider3.png'"
              alt=""
            />
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider4.png'"
              alt=""
            />
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider5.png'"
              alt=""
            />
            <img
              class="object-cover"
              :src="'assets/images/slideleft/slider6.png'"
              alt=""
            />
          </div>
          <!-- Left - Bottom -->
          <div>
            <ul class="flex justify-between items-center">
              <li>
                <a
                  href="#"
                  class="border-t-4 border-solid border-red-500 pt-[6px] inline-block text-xs text-center text"
                  >Galaxy A13|A23|A53<br />Giá Từ 4.690.000đ</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="border-t-4 border-solid border-red-500 pt-[6px] inline-block text-xs text-center"
                  >OPPO Reno7 Series 5G<br />Giá Từ 10.490.000đ</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="border-t-4 border-solid border-red-500 pt-[6px] inline-block text-xs text-center"
                  >Sắm iPhone 13 Pro<br />Giảm Đến 3,2 Triệu</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="border-t-4 border-solid border-red-500 pt-[6px] inline-block text-xs text-center"
                  >Xiaomi 12 Series<br />Quà Khủng Đến 6,5 Triệu</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="border-t-4 border-solid border-red-500 pt-[6px] inline-block text-xs text-center"
                  >Lenovo Gaming<br />Giảm Ngay 3 Triệu</a
                >
              </li>
            </ul>
          </div>
        </div>
        <!-- BANNER- RIGHT -->
        <div class="max-w[360]">
          <ul class="flex flex-wrap justify-between">
            <li>
              <a href="#" class="w-[170px] inline-block ml-[10px]"
                ><img
                  class="object-cover"
                  :src="'assets/images/slideright/slider1.jpg'"
                  alt=""
              /></a>
            </li>
            <li>
              <a href="#" class="w-[170px] inline-block ml-[10px]"
                ><img
                  class="object-cover"
                  :src="'assets/images/slideright/slider2.jpg'"
                  alt=""
              /></a>
            </li>
            <li>
              <a href="#" class="w-[170px] inline-block ml-[10px]"
                ><img
                  class="object-cover"
                  :src="'assets/images/slideright/slider4.jpg'"
                  alt=""
              /></a>
            </li>
            <li>
              <a href="#" class="w-[170px] inline-block ml-[10px]"
                ><img
                  class="object-cover"
                  :src="'assets/images/slideright/slider3.jpg'"
                  alt=""
              /></a>
            </li>
          </ul>
        </div>
      </div>
      <div><img :src="'assets/images/banner/banner1.png'" alt="" /></div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style></style>

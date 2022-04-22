<template>
  <div class="watch-component">
    <section>
      <div class="layout-container">
        <div class="mt-[60px] bg-[#2C2D38]">
          <!-- Title -->
          <div class="flex">
            <div>
              <a href="#">
                <img
                  :src="'assets/images/watch/watchbanner.png'"
                  alt="Watch Banner"
                />
              </a>
            </div>
            <div class="w-full mb-2 mr-2">
              <div class="my-[20px]">
                <div class="gap-x-3 flex">
                  <a
                    class="border-[1px] border-[#ebebeb] text-black bg-white text-[13px] leading-[10px] px-[10px] py-[11px] rounded-md"
                    href="#"
                    >Đồng hồ thông minh</a
                  >
                  <a
                    class="border-[1px] border-[#ebebeb] text-white text-[13px] leading-[10px] px-[10px] py-[11px] rounded-md"
                    href="#"
                    >Đồng hồ thời trang Nam</a
                  >
                  <a
                    class="border-[1px] border-[#ebebeb] text-white text-[13px] leading-[10px] px-[10px] py-[11px] rounded-md"
                    href="#"
                    >Đồng hồ thời trang Nữ</a
                  >
                  <a
                    class="border-[1px] border-[#ebebeb] text-white text-[13px] leading-[10px] px-[10px] py-[11px] rounded-md"
                    href="#"
                    >Định vị trẻ em</a
                  >
                  <a
                    class="border-[1px] border-[#ebebeb] text-white text-[13px] leading-[10px] px-[10px] py-[11px] rounded-md"
                    href="#"
                    >Xem tất cả <b>2.346</b> phụ kiện</a
                  >
                </div>
              </div>
              <!-- Row 1 -->
              <div class="border-[0.25px] bg-white">
                <div class="flex items-center flex-wrap">
                  <!-- ITEM -->
                  <div
                    class="item-product border-[0.25px] max-w-[calc(100%/5)] h-auto text-gray33 text-[14px] leading-[18px] px-[10px] py-[15px]"
                    v-for="product in products"
                    :key="product.id"
                  >
                    <div>
                      <div>
                        <a
                          href="#"
                          class="bg-grayf1 text-[11px] rounded-sm p-[3px]"
                          >Trả góp 0%</a
                        >
                      </div>
                      <router-link
                        :to="{ name: 'detail', params: { id: product.id } }"
                        class="link-product"
                      >
                        <div class="mt-[30px] mb-[20px]">
                          <img
                            :src="'uploads/products/' + product.thumbnail"
                            alt=""
                            class="object-cover"
                          />
                        </div>
                        <div
                          class="inline-block rounded-xl bg-gradient-to-r from-[#faab08] to-[#d42611]"
                        >
                          <div class="flex items-center pr-2">
                            <img
                              class="object-cover w-5 h-5 inline-block"
                              :src="'assets/images/icons/icon1-50x50.png'"
                              alt=""
                            />
                            <span
                              class="uppercase text-white inline-block mx-[10px] text-[10px]"
                              >Ưu đãi đến 4 triệu</span
                            >
                          </div>
                        </div>
                        <h3 class="mt-[5px] text-base font-semibold">
                          {{ product.title }}
                        </h3>
                        <div>
                          <p class="mt-[5px] line-through inline-block">
                            {{ product.price | formatTienVN }}
                          </p>
                          <span>
                            -
                            {{
                              parseInt(
                                `${
                                  100 - (product.discount / product.price) * 100
                                }`
                              )
                            }}%
                          </span>
                        </div>
                        <p class="font-bold text-[17px] mt-[5px]">
                          {{
                            product.discount > 0
                              ? format(product.discount)
                              : format(product.price)
                          }}
                        </p>
                        <p class="mt-[5px]">
                          Quà: <span>{{ format(200000) }}</span>
                        </p>
                        <div class="mt-[5px]">
                          <i class="far fa-star text-yellow-400"></i>
                          <i class="far fa-star text-yellow-400"></i>
                          <i class="far fa-star text-yellow-400"></i>
                          <i class="far fa-star text-yellow-400"></i>
                          <i class="far fa-star text-yellow-400"></i>
                          <span>5</span>
                        </div>
                      </router-link>
                    </div>
                  </div>
                </div>
                <!-- End Item -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    axios.get("/getallwatch").then((res) => {
      this.products = res.data;
    });
  },
  methods: {
    format(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VND";
    },
    price(discount, price) {
      if (discount > 0) {
        return format(discount);
      } else {
        return format(price);
      }
    },
  },
};
</script>

<style></style>

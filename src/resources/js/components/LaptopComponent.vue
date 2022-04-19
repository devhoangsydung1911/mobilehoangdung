<template>
  <div class="laptop-component">
    <section>
      <div class="layout-container">
        <div class="mt-[60px]">
          <!-- Title -->
          <div class="flex justify-between items-center">
            <h2
              class="uppercase text-gray33 font-bold text-[24px] leading-[29px]"
            >
              Laptop, Tablet nổi bật nhất
            </h2>
            <div>
              <a
                class="border-2 border-[#ebebeb] text-gray33 text-[13px] leading-[10px] px-[10px] py-[11px] rounded-3xl"
                href="#"
                >Laptop Asus</a
              >
              <a
                class="border-2 border-[#ebebeb] text-gray33 text-[13px] leading-[10px] px-[10px] py-[11px] rounded-3xl"
                href="#"
                >Laptop Hp</a
              >
              <a
                class="border-2 border-[#ebebeb] text-gray33 text-[13px] leading-[10px] px-[10px] py-[11px] rounded-3xl"
                href="#"
                >SamSung Galaxy Tab S8+</a
              >
              <a
                class="border-2 border-[#ebebeb] text-gray33 text-[13px] leading-[10px] px-[10px] py-[11px] rounded-3xl"
                href="#"
                >Xem tất cả <b>307</b> laptop</a
              >
              <a
                class="border-2 border-[#ebebeb] text-gray33 text-[13px] leading-[10px] px-[10px] py-[11px] rounded-3xl"
                href="#"
                >Xem tất cả <b>58</b> Tablet</a
              >
            </div>
          </div>
          <!-- Row 1 -->
          <div class="mt-5 border-[0.25px]">
            <div class="flex items-center flex-wrap">
              <!-- ITEM -->
              <div
                class="item-product border-[0.25px] max-w-[calc(100%/5)] h-auto text-gray33 text-[14px] leading-[18px] px-[10px] py-[15px]"
                v-for="product in products"
                :key="product.id"
              >
                <div>
                  <div>
                    <a href="#" class="bg-grayf1 text-[11px] rounded-sm p-[3px]"
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
                    <div class="bg-blue03 inline-block rounded-xl">
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
                    <ul class="mt-[5px] flex gap-x-1 items-center">
                      <li
                        class="uppercase text-[11px] border-[0.5px] border-[#ebebeb] px-[2px]"
                      >
                        Ram 8 GB
                      </li>
                      <li
                        class="uppercase text-[11px] border-[0.5px] border-[#ebebeb] px-[2px]"
                      >
                        SSD 512 GB
                      </li>
                    </ul>
                    <p class="mt-[5px] line-through">
                      {{ product.price | formatTienVN }}
                      -
                      {{
                        parseInt(`${(product.discount / product.price) * 100}`)
                      }}%
                    </p>
                    <p class="font-bold text-[17px] mt-[5px]">
                      {{
                        product.discount > 0
                          ? format(product.discount)
                          : format(product.price)
                      }}
                    </p>
                    <p class="mt-[5px]">
                      Quà: <span>{{ format(2000000) }}</span>
                    </p>
                    <div class="mt-[5px]">
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <span>11</span>
                    </div>
                  </router-link>
                </div>
              </div>
              <!-- End Item -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "LaptopComponent",
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    axios.get("/getalllaptop").then((res) => {
      this.products = res.data;
    });
  },
  methods: {
    format(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VNĐ";
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

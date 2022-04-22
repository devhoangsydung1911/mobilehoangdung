<template>
  <div class="detail-component">
    <!-- PRODUCT DETAIL -->
    <section>
      <div class="layout-container">
        <div class="mt-[60px]">
          <div class="mt-5 border-[0.25px]">
            <div class="">
              <!-- ITEM -->
              <div class="flex mt-[30px] mb-[20px] mx-[50px]">
                <div class="max-w-[420px]">
                  <img
                    :src="'uploads/products/' + product.thumbnail"
                    :alt="product.title"
                    class="object-cover"
                  />
                </div>
                <div class="px-4">
                  <h3 class="mt-[5px] text-3xl break-words">
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
                          `${100 - (product.discount / product.price) * 100}`
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
                  <p class="mt-[20px]">
                    Quà: <span>{{ format(2000000) }}</span>
                  </p>
                  <p class="mt-[20px]">
                    {{ product.desc }}
                  </p>
                  <div class="mt-[5px]">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <span>11</span>
                  </div>
                  <div class="flex gap-x-12 items-center mt-5">
                    <button
                      class="px-4 py-2 rounded-md bg-gradient-to-r from-green-500 to-blue-500 hover:from-yellow-500 hover:to-pink-500 text-white"
                      @click="addToCart()"
                    >
                      Thêm vào giỏ hàng
                    </button>
                    <button
                      class="px-4 py-2 rounded-md bg-gradient-to-r hover:from-yellow-500 hover:to-pink-500 hover:text-white border"
                    >
                      <p>
                        <i class="fas fa-heartbeat text-pink-500"></i>
                        Yêu thích
                      </p>
                    </button>
                  </div>
                </div>
              </div>
              <!-- End Item -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PRODUCT DETAIL -->

    <!-- PRODUCT DETAIL and Evaluate -->
    <section>
      <div class="layout-container">
        <div class="mt-[60px]">
          <!-- Title -->
          <div class="flex items-center gap-x-6">
            <a href="#">
              <h2
                class="uppercase border rounded-3xl px-4 py-2 text-gray33 font-bold text-[20px] leading-[29px]"
              >
                Mô tả
              </h2>
            </a>
            <a href="#">
              <h2
                class="uppercase border rounded-3xl px-4 py-2 text-gray33 font-bold text-[20px] leading-[29px]"
              >
                Đánh giá
              </h2>
            </a>
            <a href="#">
              <h2
                class="uppercase border rounded-3xl px-4 py-2 text-gray33 font-bold text-[20px] leading-[29px]"
              >
                Bình Luận Facebook
              </h2>
            </a>
          </div>
          <!-- Row 1 -->
          <div class="mt-3 border-[0.25px]">
            <div class="">
              <!-- ITEM -->
              <!-- <div class="mt-[30px] mb-[20px]">
                <div class="px-4">
                  <h3 class="mt-[5px] text-3xl">
                    SamSung Galaxy S22 Ultra 5G 256GB
                  </h3>
                  <p class="mt-[20px] line-through">
                    33 000 000 <span>-5%</span>
                  </p>
                  <p class="font-bold mt-[20px] text-3xl">33 990 000</p>
                  <p class="mt-[20px]">Quà: <span>2 000 000</span></p>
                  <p class="mt-[20px]">
                    Màn hình 6.43", Chip MediaTek Dimensity 800U 5G RAM 8 GB,
                    ROM 128 GB Camera sau: Chính 64 MP & Phụ 8 MP, 2 MP
                  </p>
                  <div class="mt-[5px]">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <span>11</span>
                  </div>
                  <div class="flex gap-x-12 items-center mt-5">
                    <button
                      class="px-4 py-2 rounded-md bg-gradient-to-r from-green-500 to-blue-500 hover:from-yellow-500 hover:to-pink-500 text-white"
                      @click="addToCart()"
                    >
                      Thêm vào giỏ hàng
                    </button>
                    <button
                      class="px-4 py-2 rounded-md bg-gradient-to-r hover:from-yellow-500 hover:to-pink-500 hover:text-white border"
                    >
                      <p>
                        <i class="fas fa-heartbeat text-pink-500"></i>
                        Yêu thích
                      </p>
                    </button>
                  </div>
                </div>
              </div> -->
              <!-- End Item -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PRODUCT DETAIL and Evaluate -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      product: {},
      id: this.$route.params.id,
      user: {},
    };
  },
  created() {
    axios.get("/getuser").then((res) => {
      this.user = res.data;
    });
    // axios.get("/detail/" + `${this.id}`).then((res) => {
    //   this.product = res.data;
    // });
    this.$root.$on("itemid", (item) => {
      this.id = item;
    });
  },
  mounted() {
    this.getdetail();
  },

  methods: {
    async getdetail() {
      let response = await axios.post("/detail", { id: this.id });
      this.product = response.data;
    },
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
    async addToCart() {
      if (this.user.role_id == 1) {
        let response = await axios.post("/addtocart", {
          product_id: this.id,
          user_id: this.user.id,
        });
        this.$root.$emit("items", response.data.items);
        this.$toaster.success("Đã thêm vào giỏ hàng !", 7000);
      } else {
        this.$toaster.warning("Đăng nhập trước khi mua sản phẩm !", 7000);
      }
    },
  },
};
</script>

<style></style>

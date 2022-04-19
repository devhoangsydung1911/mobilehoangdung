<template>
  <div class="card-component">
    <section>
      <div class="layout-container">
        <div class="mt-[40px]">
          <!-- Title -->
          <h2
            class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]"
          >
            Giỏ hàng
          </h2>
          <h2
            class="uppercase text-center text-gray33 font-bold text-[20px] leading-[29px]"
            v-show="!showTable"
            style="margin: 80px 0"
          >
            Không có sản phẩm trong giỏ hàng !
          </h2>
          <!-- Row Table -->
          <div v-show="showTable">
            <div class="mt-3 border-[0.25px]">
              <table class="table-fixed w-full text-center text-lg">
                <thead class="border-b">
                  <tr>
                    <th>Hình ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in items"
                    :key="item.id"
                    class="border-b"
                  >
                    <td class="p-2 object-cover">
                      <img
                        :src="'uploads/products/' + item.thumbnail"
                        alt=""
                        class="w-[120px] m-auto"
                      />
                    </td>
                    <td>{{ item.title }}</td>
                    <td>{{ item.price | formatTienVN }}</td>
                    <td>
                      <!-- <button
                      type="button"
                      class="bg-slate-500 text-white inline-block w-8 h-7 rounded-lg leading-[28px]"
                      @click="reduction"
                    >
                      &#8722;
                    </button> -->
                      <span class="mx-4">{{ item.quantity }}</span>
                      <!-- <button
                      type="button"
                      class="bg-slate-500 text-white inline-block w-8 h-7 rounded-lg leading-[28px]"
                      @click="add"
                    >
                      &#43;
                    </button> -->
                    </td>
                    <td>{{ item.total_money | formatTienVN }}</td>
                    <td>
                      <button
                        class="px-[30px] py-[5px] rounded-lg hover:bg-slate-500 hover:text-white"
                        @click="deleteItem(item, index)"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="w-[20px] h-[20px] text-3xl text-center inline-block"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            class="p-4"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table -->
            </div>
            <div class="flex mt-3 justify-end">
              <div class="uppercase font-bold px-4 py-2 text-right">
                <p class="text-[30px] leading-[29px]">Tổng tiền</p>
                <p class="mt-3 text-xl">
                  Thành tiền:
                  <span>
                    {{ getAllMoney() | formatTienVN }}
                  </span>
                </p>
                <router-link :to="{ name: 'payment' }">
                  <button
                    class="uppercase inline-block border rounded-3xl bg-gradient-to-r from-green-500 to-blue-500 hover:from-yellow-500 hover:to-pink-500 text-white mt-3 px-4 py-2 font-bold text-[20px] leading-[29px]"
                  >
                    Thanh Toán
                  </button>
                </router-link>
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
      total: 0,
      items: [],
      showTable: false,
    };
  },
  created() {
    this.getCartItem();
  },
  updated() {
    this.show();
  },
  methods: {
    reduction() {
      if (this.total <= 1) {
        return;
      } else {
        return (this.total -= 1);
      }
    },
    add() {
      return (this.total += 1);
    },
    async getCartItem() {
      let response = await axios.get("/checkout/get/item");
      this.items = Object.values(response.data);
    },
    async deleteItem(item, index) {
      this.items.splice(index, 1);
      let response = await axios.post("/delete/cartitem", {
        cart_id: item.cart_id,
      });
      this.$root.$emit("deleted", response.data.items);
    },
    show() {
      if (this.items.length > 0) {
        this.showTable = true;
      } else {
        this.showTable = false;
      }
    },
    getAllMoney() {
      let sum = 0;
      this.items.map((item) => {
        sum += item.total_money;
      });
      return sum;
    },
  },
};
</script>

<style></style>

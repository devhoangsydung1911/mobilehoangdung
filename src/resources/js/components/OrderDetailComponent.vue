<template>
  <section id="pdf">
    <div class="mt-[60px]">
      <div class="layout-container">
        <!-- Title -->
        <h2
          class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]"
        >
          Chi tiết đơn hàng
        </h2>
        <div>
          <h2
            class="uppercase mt-3 mb-1 text-gray33 font-bold text-[20px] leading-[29px]"
          >
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
                <td>{{ this.user.username }}</td>
                <td>{{ this.user.email }}</td>
                <td>
                  <span class="mx-4">{{ this.user.phone_number }}</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- Row Table -->
        <div class="mt-3">
          <h2
            class="uppercase mb-1 text-gray33 font-bold text-[20px] leading-[29px]"
          >
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
                <td>{{ this.order.name }}</td>
                <td>{{ this.order.email }}</td>
                <td>
                  <span class="mx-4">{{ this.order.phone_number }}</span>
                </td>
                <td>{{ this.order.note }}</td>
                <td>Tiền mặt</td>
                <td>{{ this.order.address }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <h2
            class="uppercase mb-1 text-gray33 font-bold text-[20px] leading-[29px]"
          >
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
              <tr
                class="border-b-[1px]"
                v-for="(item, index) in items"
                :key="index"
              >
                <td>{{ (index += 1) }}</td>
                <td>{{ item.title }}</td>
                <td>{{ item.price | formatTienVN }}</td>
                <td>
                  <span class="mx-4">{{ item.quantity }}</span>
                </td>
                <td>{{ item.total_money | formatTienVN }}</td>
                <td>{{ item.created }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <h2
            class="uppercase mb-1 text-gray33 font-bold text-[20px] leading-[29px]"
          >
            Thanh toán
          </h2>
          <table class="border-[0.5px] table-auto w-full text-center text-base">
            <thead class="border-[0.5px] text-lg">
              <tr>
                <th>Tổng tiền sản phẩm</th>
                <th>Giảm giá</th>
                <th>Phí vận chuyển</th>
                <th>Tiền cần thanh toán</th>
                <th>In đơn hàng</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b-[1px]">
                <td>{{ getAllMoney() | formatTienVN }}</td>
                <td>0</td>
                <td>50 000</td>
                <td>{{ (getAllMoney() + 50000) | formatTienVN }}</td>
                <td>
                  <button
                    class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1"
                    @click="exportPDF()"
                  >
                    Xuất hóa đơn
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      user: {},
      order: {},
      items: [],
    };
  },
  created() {
    this.getOrder();
    this.getCartItem();
  },
  methods: {
    async getOrder() {
      let response = await axios.get("/getUserOrder");
      this.user = response.data.user;
      this.order = response.data;
    },
    async getCartItem() {
      let response = await axios.get("/checked/get/item");
      this.items = Object.values(response.data);
    },
    getAllMoney() {
      if (this.items.length > 0) {
        let sum = 0;
        this.items.map((item) => {
          sum += item.total_money;
        });
        return sum;
      }
    },
    async exportPDF() {
      let response = await axios.get("/pdf");
      window.location.href = "https://mobilehoangdung.tk/pdf";
    },
  },
};
</script>

<style></style>

<template>
  <section>
    <div class="mt-[60px]">
      <div class="layout-container">
        <!-- Title -->
        <h2
          class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]"
        >
          Đơn hàng
        </h2>
        <h2
          class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]"
          v-show="isCheckShow"
        >
          Chưa có đơn hàng mới !
        </h2>
        <!-- Row Table -->
        <div class="mt-2 border-[0.25px]" v-show="!isCheckShow">
          <table class="table-auto w-full text-center text-base">
            <thead class="border-[1px] text-lg">
              <tr>
                <th>Tên</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th>Tiện ích</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b-[1px] py-[12px]">
                <td>{{ this.user.username }}</td>
                <td>{{ this.order.created_at }}</td>
                <td>Chờ tiếp nhận</td>
                <td>
                  <router-link :to="{ name: 'orderdetail' }">
                    <button
                      class="px-[10px] py-[5px] bg-green-500 text-white rounded-md mr-1"
                    >
                      Xem chi tiết
                    </button>
                  </router-link>
                  <!-- <a href="">
                    <button
                      class="px-[10px] py-[5px] bg-red-500 text-white rounded-md"
                    >
                      Xóa
                    </button>
                  </a> -->
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
      isCheckShow: true,
    };
  },
  created() {
    this.getOrder();
    this.isShow();
  },
  methods: {
    async getOrder() {
      let response = await axios.get("/getUserOrder");
      this.user = response.data.user;
      this.order = response.data;
    },
    isShow() {
      if (this.order.user_id == this.user.id) {
        this.isCheckShow = false;
      } else {
        this.isCheckShow = true;
      }
    },
  },
};
</script>

<style></style>

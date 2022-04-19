<template>
  <div class="payment-component">
    <!-- PRODUCT DETAIL and Evaluate -->

    <section>
      <div class="layout-container">
        <div class="mt-[40px]">
          <!-- Title -->
          <h2
            class="uppercase text-center mb-5 text-gray33 font-bold text-[20px] leading-[29px]"
          >
            Thanh Toán
          </h2>
          <!-- Row Table -->
          <div class="mt-3 border-[0.25px]">
            <table class="table-fixed w-full text-center text-lg">
              <thead class="border-b">
                <tr>
                  <th>Hình ảnh</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(item, index) in items"
                  :key="index"
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
                    <span class="mx-4">{{ item.quantity }}</span>
                  </td>
                  <td>{{ item.total_money | formatTienVN }}</td>
                </tr>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
          <div class="flex mt-3 justify-end">
            <div class="uppercase font-bold px-4 py-2 text-right">
              <p class="text-[30px] leading-[29px]">Tổng tiền</p>
              <p class="mt-3 text-xl">
                Phí giao hàng mặc định: <span>{{ 50000 | formatTienVN }}</span>
              </p>
              <p class="mt-3 text-xl">
                Thành tiền: <span>{{ getAllMoney() | formatTienVN }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PRODUCT DETAIL and Evaluate -->

    <!-- Thông tin địa chỉ -->
    <section>
      <div class="layout-container">
        <div class="pb-1">
          <div class="text-center">
            <p class="uppercase px-4 py-2 text-gray33 font-bold leading-[29px]">
              Tính phí vận chuyển
            </p>
          </div>
          <div class="mt-3">
            <div>
              <form
                action=""
                class="flex items-center justify-between gap-x-12"
              >
                <div class="inline-block text-center bg-none w-[calc(100%/3)]">
                  <p class="uppercase font-bold">Tỉnh / Thành phố</p>
                  <select
                    class="mt-3 block font-semibold w-full p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                    name="province"
                    id=""
                    @change="onProvince($event)"
                  >
                    <option value="">--- Chọn Tỉnh / Thành phố ---</option>
                    <option
                      class=""
                      v-for="province in provinces"
                      :key="province.id"
                      :value="province.id"
                    >
                      {{ province.name }}
                    </option>
                  </select>
                </div>
                <div class="inline-block text-center bg-none w-[calc(100%/3)]">
                  <p class="uppercase font-bold">Quận / Huyện</p>
                  <select
                    class="mt-3 block font-semibold w-full p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                    name=""
                    id=""
                    @change="onDistrict($event)"
                  >
                    <option value="">--- Chọn Quận / Huyện ---</option>
                    <option
                      class=""
                      v-for="district in districts"
                      :key="district.id"
                      :value="district.id"
                    >
                      {{ district.name }}
                    </option>
                  </select>
                </div>
                <div class="inline-block text-center bg-none w-[calc(100%/3)]">
                  <p class="uppercase font-bold">Phường / Xã</p>
                  <select
                    class="mt-3 block font-semibold w-full p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                    name=""
                    id=""
                    @change="onWard($event)"
                  >
                    <option value="">--- Chọn Phường / Xã ---</option>
                    <option
                      v-for="ward in wards"
                      :key="ward.id"
                      :value="ward.id"
                    >
                      {{ ward.name }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Kết thúc thông tin địa chỉ -->

    <!-- Thông tin người mua -->
    <section>
      <div class="layout-container">
        <div class="mt-16">
          <div>
            <form action="">
              <div class=" ">
                <div class="text-center">
                  <p
                    class="uppercase px-4 py-2 text-gray33 font-bold leading-[29px]"
                  >
                    Thông tin người mua
                  </p>
                </div>
                <div class="flex gap-x-12">
                  <div class="w-[calc(100%/2)]">
                    <div>
                      <p class="font-bold mt-3 mb-1">Họ Tên:</p>
                      <input
                        class="border-2 px-2 py-1 text-base w-full rounded-[4px]"
                        type="text"
                        v-model="name"
                        required
                      />
                    </div>
                    <div>
                      <p class="font-bold mt-3 mb-1">Email:</p>
                      <input
                        class="border-2 px-2 py-1 text-base w-full rounded-[4px]"
                        type="email"
                        v-model="email"
                      />
                    </div>
                    <div>
                      <p class="font-bold mt-3 mb-1">Điện thoại:</p>
                      <input
                        class="border-2 px-2 py-1 text-base w-full rounded-[4px]"
                        type="number"
                        v-model="phone_number"
                        required
                      />
                    </div>
                  </div>
                  <div class="w-[calc(100%/2)]">
                    <p class="font-bold mt-3">Ghi chú</p>
                    <textarea
                      class="border-2 px-2 py-1 text-base w-full rounded-[4px]"
                      name=""
                      id=""
                      cols="30"
                      rows="8"
                      v-model="note"
                      placeholder="Số nhà, thời gian có thể nhận hàng trong ngày ..."
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="mt-16 text-center">
                <!-- Hình thức thanh toán -->
                <!-- <div class=" ">
                  <p
                    class="uppercase px-4 py-2 text-gray33 font-bold leading-[29px]"
                  >
                    Hình thức thanh toán
                  </p>
                  <select
                    class="mt-3 block font-semibold w-full p-2 text-center bg-white border border-solid border-gray-300 rounded-md"
                    name=""
                  >
                    <option value="" selected>
                      ---- Chọn hình thức thanh toán ----
                    </option>
                    <option value="">Thanh toán khi nhận hàng</option>
                    <option value="">VN Pay</option>
                    <option value="">MoMo</option>
                  </select>
                </div> -->
                <div style="margin-top: 80px">
                  <button
                    type="button"
                    @click="sendPayMent()"
                    class="px-4 py-2 rounded-md bg-gradient-to-r hover:from-yellow-500 hover:to-pink-500 hover:text-white border"
                  >
                    <p>Xác nhận đặt hàng</p>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Kết thúc thông tin người mua -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      provinces: [],
      districts: [],
      wards: [],
      user: {},
      province: 0,
      district: 0,
      ward: 0,
      name: "",
      phone_number: "",
      email: "",
      note: "",
    };
  },
  created() {
    this.getCartItem();
    this.getAllMoney();
    this.getProvinces();
    axios.get("/getuser").then((res) => {
      this.user = res.data;
    });
  },

  methods: {
    async getProvinces() {
      let response = await axios.get("/map/getprovince");
      this.provinces = response.data;
    },
    async getCartItem() {
      let response = await axios.get("/checkout/get/item");
      this.items = Object.values(response.data);
    },
    /** Tính tổng tiền và tiền ship */
    getAllMoney() {
      if (this.items.length > 0) {
        let sum = 50000;
        this.items.map((item) => {
          sum += item.total_money;
        });
        return sum;
      }
    },
    /** Lấy thông tin địa chỉ */
    onProvince(event) {
      this.province = event.target.value;
      axios
        .post("/map/province", {
          province_id: this.province,
        })
        .then((response) => (this.districts = response.data));
    },
    onDistrict(event) {
      this.district = event.target.value;
      axios
        .post("map/district", { district_id: this.district })
        .then((response) => {
          this.wards = response.data;
        });
    },
    onWard(event) {
      this.ward = event.target.value;

      console.log(event.target.name);
    },

    /** Kiểm tra thông tin địa chỉ */
    async sendPayMent() {
      if (this.province == "" || this.district == "" || this.ward == "") {
        alert("Bạn chưa chọn thông tin nhận hàng !");
        return;
      } else if (this.name == "" || this.phone_number == "") {
        alert("Bạn chưa nhập tên hoặc thông tin khi nhận hàng !");
        return;
      } else {
        if (this.user.role_id == 1) {
          let response = await axios.post("/order", {
            province: this.province,
            district: this.district,
            ward: this.ward,
            name: this.name,
            note: this.note,
            email: this.email,
            phone_number: this.phone_number,
            user_id: this.user.id,
            total_money: this.getAllMoney(),
          });
          this.$toaster.success("Đã tạo đơn hàng thành công !", 7000);
          window.location.href = "http://localhost:8080/order";
        }
      }
    },
  },
};
</script>

<style></style>

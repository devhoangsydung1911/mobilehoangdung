<template>
    <div>
        <!-- HEADER -->
        <header>
            <div class="layout-container">
                <div class="flex items-center my-9 justify-between">
                    <!-- Logo -->
                    <div>
                        <router-link
                            :to="{ name: 'home' }"
                            class="font-extrabold text-[23px]"
                        >
                            MobileStore
                        </router-link>
                    </div>
                    <!-- Search -->
                    <div
                        class="bg-[#F1F3F5] w-full max-w-[487px] h-11 flex justify-between items-center rounded-[20px] pl-3"
                    >
                        <input
                            type="text"
                            class="bg-transparent text-[18px] h-full w-full"
                            placeholder="Nhập tên điện thoại, máy tính, phụ kiện .... cần tìm"
                        />
                        <button class="h-full px-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </button>
                    </div>
                    <!-- Member -->
                    <div>
                        <ul class="flex items-center gap-x-7">
                            <li>
                                <router-link
                                    :to="{ name: 'cart' }"
                                    class="flex items-center"
                                >
                                    <div class="mr-3">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="text-center">
                                        <span>
                                            <p
                                                class="rounded-xl bg-sky-600 text-white font-semibold"
                                            >
                                                {{ this.itemsCount }}
                                            </p>
                                            <p>Giỏ Hàng</p>
                                        </span>
                                    </div>
                                </router-link>
                            </li>
                            <li class="flex justify-center items-center show">
                                <img
                                    class="bg-black w-10 h-10 rounded-[50%] object-cover mr-2"
                                    :src="'assets/images/user.jpg'"
                                    alt=""
                                />
                                <a
                                    v-show="
                                        this.user.role_id == 1 ? false : true
                                    "
                                    href="/login"
                                    class="flex justify-between items-center"
                                >
                                    <span>
                                        Đăng ký <br />
                                        Đăng nhập</span
                                    >
                                </a>
                                <div class="inline-block">
                                    <button @click.prevent="showLogOut()">
                                        {{ this.user.username }}
                                    </button>
                                    <div
                                        v-show="onShow"
                                        class="isLogout text-center shadow-xl rounded-[4px]"
                                    >
                                        <button
                                            @click="logout()"
                                            class="w-full py-1"
                                        >
                                            Đăng xuất
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- NAV -->
        <section>
            <hr />
            <div class="layout-container">
                <div class="flex justify-center items-center gap-x-14">
                    <!-- <ul id="mybtn" class="flex justify-center items-center gap-x-14">
            <li>
              <router-link to="/" class="link-nav-custom active"
                >Trang chủ</router-link
              >
            </li>
            <li>
              <router-link :to="{ name: 'mobile' }" class="link-nav-custom"
                >Điện thoại</router-link
              >
            </li>
            <li>
              <router-link :to="{ name: 'laptop' }" class="link-nav-custom"
                >Laptop</router-link
              >
            </li>
            <li>
              <router-link :to="{ name: 'headphone' }" class="link-nav-custom"
                >Phụ kiện</router-link
              >
            </li>
            <li>
              <router-link to="/" class="link-nav-custom">Đồng hồ</router-link>
            </li>
            <li>
              <router-link to="/" class="link-nav-custom">Đơn hàng</router-link>
            </li>
            <li>
              <router-link to="/" class="link-nav-custom"
                >Tiện Ích
                <i class="fa-solid fa-angle-down ml-1"></i>
              </router-link>
            </li>
          </ul> -->
                    <div
                        id="mybtn"
                        class="flex justify-center items-center gap-x-14"
                    >
                        <router-link
                            to="/"
                            class="link-nav-custom"
                            active-class="active"
                            exact
                            >Trang chủ</router-link
                        >

                        <router-link
                            :to="{ name: 'mobile' }"
                            class="link-nav-custom"
                            active-class="active"
                            >Điện thoại</router-link
                        >

                        <router-link
                            :to="{ name: 'laptop' }"
                            class="link-nav-custom"
                            active-class="active"
                            >Laptop</router-link
                        >

                        <router-link
                            :to="{ name: 'headphone' }"
                            class="link-nav-custom"
                            active-class="active"
                            >Phụ kiện</router-link
                        >

                        <router-link
                            :to="{ name: 'watch' }"
                            class="link-nav-custom"
                            active-class="active"
                            >Đồng hồ</router-link
                        >
                        <router-link
                            :to="{ name: 'order' }"
                            class="link-nav-custom"
                            active-class="active"
                            >Đơn hàng</router-link
                        >
                    </div>
                </div>
            </div>
            <hr />
        </section>
    </div>
</template>

<script>
export default {
    name: "LayoutHeader",
    data() {
        return {
            user: {},
            onShow: false,
            itemsCount: 0,
        };
    },
    mounted() {
        axios.get("/getuser").then((res) => {
            return (this.user = res.data);
        });
        this.$root.$on("items", (items) => {
            this.itemsCount = items;
        });
        this.$root.$on("deleted", (items) => {
            this.itemsCount = items;
        });
    },
    methods: {
        showLogOut() {
            return (this.onShow = !this.onShow);
        },
        logout() {
            axios.get("/logout");
            window.location.reload();
            this.$toaster.success("Đăng xuất thành công !", 7000);
            window.location.reload();
            // window.location.href = "https://mobilehoangdung.tk";
            return (this.onShow = false);
        },
        async getCartItem() {
            let response = await axios.post("/addtocart");
            this.itemsCount = response.data.items;
        },
    },
    created() {
        this.getCartItem();
    },

    watch: {
        isShow: () => {
            return this.user.role_id == 1 ? false : true;
        },
    },
};
</script>

<style scoped>
.link-nav-custom {
    display: inline-block;
    height: 100%;
    padding: 10px 20px;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: bold;
    transition: all 0.4s ease;
}

.active {
    color: white;
    background-color: #f85a47;
    cursor: pointer;
}
.link-nav-custom:hover {
    color: white;
    background-color: #f85a47;
    cursor: pointer;
}
.show {
    position: relative;
}
.isLogout {
    z-index: 5;
    position: absolute;
    top: 110%;
    left: 0;
    width: 150px;
    height: auto;
    font-size: 18px;
    background-color: #ebebeb;
}
</style>

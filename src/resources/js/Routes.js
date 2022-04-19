import App from "./App.vue";
import LayoutHome from "./layout/LayoutHome.vue";
import MobileComponent from "./components/MobileComponent.vue";
import LaptopComponent from "./components/LaptopComponent.vue";
import HeadphoneComponent from "./components/HeadphoneComponent.vue";
import WatchComponent from "./components/WatchComponent.vue";
import CartComponent from "./components/CartComponent.vue";
import PaymentComponent from "./components/PaymentComponent.vue";

import OrderComponent from "./components/OrderComponent.vue";
import OrderDetailComponent from "./components/OrderDetailComponent.vue";
import DetailComponent from "./components/DetailComponent.vue";

export default {
  mode: "history",
  routes: [
    {
      path: "/",
      component: LayoutHome,
      name: "home",
      meta: {
        layout: "home",
      },
    },
    {
      path: "/mobile",
      name: "mobile",
      component: MobileComponent,
      meta: {
        layout: "MobileComponent",
      },
    },
    { path: "/laptop", name: "laptop", component: LaptopComponent },
    { path: "/headphone", name: "headphone", component: HeadphoneComponent },
    { path: "/watch", name: "watch", component: WatchComponent },
    // Chi tiết sản phẩm
    { path: "/detail/:id", name: "detail", component: DetailComponent },

    // Chi tiết đơn hàng
    { path: "/cart", name: "cart", component: CartComponent },

    // Thanh toán
    {
      path: "/payment",
      name: "payment",
      component: PaymentComponent,
    },

    //Order
    {
      path: "/order",
      name: "order",
      component: OrderComponent,
      children: [],
    },
    {
      path: "orderdetail",
      name: "orderdetail",
      component: OrderDetailComponent,
    },
    { path: "*", redirect: "home" },
  ],
};

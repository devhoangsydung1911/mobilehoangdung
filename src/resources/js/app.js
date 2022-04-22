// require("./bootstrap");

window.Vue = require("vue");
window.axios = require("axios").default;

Vue.filter("formatTienVN", (num) => {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VND";
});

import Toaster from "v-toaster";

import "v-toaster/dist/v-toaster.css";

Vue.use(Toaster, { timeout: 5000 });

Vue.component("app-component", require("./App.vue").default);

import Vue from "vue";
import VueRouter from "vue-router";
import Routes from "./Routes";
Vue.use(VueRouter);
// const EventBus = new Vue();

const router = new VueRouter(Routes);

const app = new Vue({
  el: "#app",
  router: router,
});

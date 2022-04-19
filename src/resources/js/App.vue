<template>
  <div>
    <LayoutTop></LayoutTop>
    <LayoutBanner></LayoutBanner>
    <router-view></router-view>
    <LayoutFoodter></LayoutFoodter>
  </div>
</template>

<script>
import LayoutTop from "./layout/LayoutHeader.vue";
import LayoutBanner from "./layout/LayoutBanner.vue";
import LayoutFoodter from "./layout/LayoutFoodter.vue";
export default {
  components: {
    LayoutTop,
    LayoutBanner,
    LayoutFoodter,
  },
  methods: {},
};
</script>

<style></style>

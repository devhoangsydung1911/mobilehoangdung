<template>
  <div class="layout-home">
    <mobile-component />
    <laptop-component />
    <headphone-component />
    <watch-component />
  </div>
</template>

<script>
import MobileComponent from "../components/MobileComponent.vue";
import LaptopComponent from "../components/LaptopComponent.vue";
import HeadphoneComponent from "../components/HeadphoneComponent.vue";
import WatchComponent from "../components/WatchComponent.vue";

export default {
  components: {
    MobileComponent,
    LaptopComponent,
    HeadphoneComponent,
    WatchComponent,
  },
  methods: {},
};

MobileComponent;
</script>

<style></style>

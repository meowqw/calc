<template>
  <div id="app">
    <div class="site-container">
      <main class="main">
        <calc-header />
        <calc-main-wrapper />
      </main>
    </div>
  </div>
</template>

<script>
import calcHeader from "./components/calc-header.vue";
import calcMainWrapper from "./components/calc-main-wrapper.vue";

export default {
  name: "App",
  components: {
    calcHeader,
    calcMainWrapper,
  },
};
</script>

<style lang="scss">
#app {
  height: 100%;
  font-family: $font-family, sans-serif;
  -webkit-text-size-adjust: 100%;
}
</style>

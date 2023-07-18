<template>
  <div class="calc-item-counter calc-item block block--second">
    <h3 class="calc-item__title title title--h3">Количество отверстий</h3>
    <form class="calc-item__form">
      <calc-counter/>
    </form>
  </div>
</template>

<script>
import calcCounter from "@/components/calc-counter"
export default {
  name: "calc-item-counter",
  components: {
    calcCounter
  }
};
</script>

<style lang="scss" scoped></style>

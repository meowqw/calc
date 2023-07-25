<template>
  <div class="calc-item-counter calc-item block block--second">
    <h3 class="calc-item__title title title--h3">Количество отверстий</h3>
    <form class="calc-item__form">
      <calc-counter @quantityChanged="onQuantityChanged"/>
    </form>
  </div>
</template>

<script>
import calcCounter from "@/components/calc-counter.vue"
export default {
  name: "calc-item-counter",
  components: {
    calcCounter
  },
  data() {
    return {
      quantity: 1,
    }
  },
  methods: {
    onQuantityChanged(value) {
      this.quantity = value;
      // перебрасываем значение родителю
      this.$emit("quantityUpdate", this.quantity);
    }
  }
};
</script>

<style lang="scss" scoped></style>

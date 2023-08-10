<template>
  <div class="calc-item-counter calc-item block block--second">
    <h3 class="calc-item__title title title--h3">{{ title }}</h3>
    <form class="calc-item__form">
      <calc-counter
        @quantityChanged="onQuantityChanged"
        :quantity="this.quantity"
      />
    </form>
  </div>
</template>

<script>
import calcCounter from "@/components/calc-counter";
export default {
  name: "calc-item-counter",
  components: {
    calcCounter,
  },
  props: {
    title: {
      type: String,
    },
  },
  data() {
    return {
      quantity: 1,
    };
  },
  methods: {
    onQuantityChanged(value) {
      this.quantity = value;
      // перебрасываем значение родителю
      this.$emit("quantityUpdate", this.quantity);
    },
  },
};
</script>

<style lang="scss" scoped></style>

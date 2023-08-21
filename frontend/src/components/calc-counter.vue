<template>
  <div class="counter">
    <button class="btn-reset btn counter__btn" @click.prevent="decrementItem">
      <font-awesome-icon :icon="['fas', 'minus']" />
    </button>
    <input
      v-model="localQuantity"
      @input="updateQuantity"
      @focus="clearInput"
      class="input-reset counter__input input"
      type="number"
      name="quantity"
      placeholder="0"
    />
    <button class="btn-reset btn counter__btn" @click.prevent="incrementItem">
      <font-awesome-icon :icon="['fas', 'plus']" />
    </button>
  </div>
</template>

<script>
export default {
  name: "calc-counter",
  data() {
    return {
      localQuantity: this.quantity,
    };
  },
  props: {
    quantity: {
      type: Number,
      required: true,
    },
  },
  methods: {
    decrementItem() {
      if (this.localQuantity >= 1) {
        this.localQuantity--;
        this.emitQuantityChanged();
      }
    },

    incrementItem() {
      this.localQuantity++;
      this.emitQuantityChanged();
    },

    // пербрасываем значение родителю
    emitQuantityChanged() {
      this.$emit("quantityChanged", this.localQuantity);
    },

    updateQuantity() {
      this.emitQuantityChanged();
    },

    clearInput() {
      this.localQuantity = "";
    },
  },
  watch: {
    localQuantity(newQuantity) {
      this.localQuantity = newQuantity;
    },
  },
};
</script>

<style lang="scss" scoped>
.counter {
  display: flex;
  max-width: 200px;

  &__label {
    margin-right: 10px;

    @include small-tablet {
      font-size: 14px;
    }

    @include mobile {
      margin-right: 0;
      margin-bottom: 5px;
      font-size: 13px;
      text-align: center;
    }
  }

  &__input {
    margin: 0 10px;
    padding: 10px 12px;
    width: 70px;
    font-weight: 700;
    font-size: 14px;
    text-align: center;
  }

  &__btn {
    padding: 0;
    width: 34px;
    height: 34px;
    font-size: 18px;
  }
}
</style>

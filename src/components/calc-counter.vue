<template>
  <div class="counter">
    <button class="btn-reset btn counter__btn">
      <font-awesome-icon :icon="['fas', 'minus']" />
    </button>
    <input
      class="input-reset counter__input input"
      type="number"
      pk="2"
      price="1.1"
      id="coef2"
      value="Алмазное сверление с водосборным кольцом пылесосом"
    />
    <button class="btn-reset btn counter__btn">
      <font-awesome-icon :icon="['fas', 'plus']" />
    </button>
  </div>
</template>

<script>
export default {
  name: "calc-counter",
};
</script>

<style lang="scss" scoped>
.counter {
  display: flex;
  max-width: 160px;

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
    width: 40px;
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

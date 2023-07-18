<template>
  <div class="calc-item-checkbox calc-item block block--second">
    <h3 class="calc-item__title title title--h3">Диаметр коронки</h3>
    <form action="#" class="form calc-item-checkbox__form">
      <label class="custom-checkbox calc-item__form-item">
        <input type="radio" name="crown" class="custom-checkbox__field" />
        <span
          class="custom-checkbox__content custom-checkbox__content--radio"
        ></span>
        20 см
      </label>
    </form>
  </div>
</template>

<script>
export default {
  name: "calc-item-checkbox",
};
</script>

<style lang="scss" scoped>
.calc-item-checkbox {
    &__form {
        display: flex;
        flex-wrap: wrap;
        column-gap: 8px;
        row-gap: 5px;
    }
}
</style>

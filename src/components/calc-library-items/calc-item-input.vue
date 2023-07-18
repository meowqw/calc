<template>
  <div class="calc-item-input calc-item block block--second">
    <h3 class="calc-item__title title title--h3">Длина реза</h3>
    <form action="#" class="calc-item__form form">
      <label class="form__label label calc-item__label">
        <input
          type="number"
          name="название"
          class="input-reset input form__input"
          placeholder="Длина реза"
        />
        <div class="tooltip">
          <font-awesome-icon class="icon" :icon="['fas', 'circle-info']" />
          <div class="tooltip__text">Введите длину реза</div>
        </div>
      </label>
    </form>
  </div>
</template>

<script>
export default {
  name: "calc-item-input",
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped></style>

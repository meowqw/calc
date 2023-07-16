<template>
  <div class="sale calc-item">
    <div class="container sale__container block">
      <h2 class="calc-item__title title title--h3">Скидка</h2>
      <form action="#" class="calc-item__form form">
        <label class="form__label label calc-item__label">
          <input
            type="text"
            name="название"
            class="input-reset input calc-item__input form__input"
            placeholder="Процент скидки"
          />
          <div class="tooltip">
            <font-awesome-icon class="icon" :icon="['fas', 'circle-info']" />
            <div class="tooltip__text">Введите процент скидки</div>
          </div>
        </label>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "calc-item-sale",
  data() {
    return {
      type: "number",
    };
  },
};
</script>

<style lang="scss" scoped></style>

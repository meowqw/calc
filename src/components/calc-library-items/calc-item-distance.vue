<template>
  <div class="distance calc-item">
    <div class="container calc-item__container block">
      <h2 class="calc-item__title title title--h3">Удаленность от МКАД</h2>
      <form action="#" class="calc-item__form form">
        <label class="form__label label calc-item__label">
          <!-- <span>Название НП</span> -->
          <input
            type="text"
            name="название"
            class="input-reset input calc-item__input form__input"
            placeholder="Название НП"
          />
          <div class="tooltip">
            <font-awesome-icon class="icon" :icon="['fas', 'circle-info']" />
            <div class="tooltip__text">Название населенного пункта до МКАД</div>
          </div>
        </label>
        <button class="btn-reset btn calc-item__btn">Рассчитать</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "calc-item-distance",
};
</script>

<style lang="scss" scoped></style>

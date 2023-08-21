<template>
  <div class="sale calc-item">
    <div class="container sale__container block">
      <h2 class="calc-item__title title title--h3">Скидка</h2>
      <form action="#" class="calc-item__form form">
        <label class="form__label label calc-item__label">
          <input
            type="number"
            min="0"
            name="название"
            class="input-reset input calc-item__input form__input"
            placeholder="Процент скидки"
            v-model="sale"
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
import { mapMutations } from "vuex";

export default {
  name: "calc-item-sale",
  data() {
    return {
      sale: null,
    };
  },
  methods: {
    ...mapMutations(["UPDATE_SALE"]),

    // отправка значения в мутацию
    sendSale() {
      this.UPDATE_SALE(this.sale);
    },
  },
  watch: {
    sale(newValue) {
      this.sendSale(newValue);
    }
  }
};
</script>

<style lang="scss" scoped></style>

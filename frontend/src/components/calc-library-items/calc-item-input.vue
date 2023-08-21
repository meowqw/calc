<template>
  <div class="calc-item-input calc-item block block--second">
    <h3 class="calc-item__title title title--h3">{{ title }}</h3>
    <form action="#" class="calc-item__form form">
      <label class="form__label label calc-item__label">
        <input
          type="number"
          :name="title"
          min="0"
          class="input-reset input form__input"
          placeholder="0"
          v-model.number="value"
          @input="updateInputValue"
          @focus="clearInput"
        />
        <div class="tooltip">
          <font-awesome-icon class="icon" :icon="['fas', 'circle-info']" />
          <div class="tooltip__text">Введите {{ title }}</div>
        </div>
      </label>
    </form>
  </div>
</template>

<script>
export default {
  name: "calc-item-input",
  data() {
    return {
      value: 0,
    };
  },
  props: {
    title: {
      type: String,
    },
  },
  methods: {
    // отправка значения родителю
    updateInputValue() {
      this.$emit("inputChanged", this.value);
    },

    clearInput() {
      this.value = "";
    },
  },
};
</script>

<style lang="scss" scoped></style>

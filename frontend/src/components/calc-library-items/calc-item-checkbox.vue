<template>
  <div class="calc-item-checkbox calc-item block block--second">
    <h3 class="calc-item__title title title--h3">{{ title }}</h3>
    <form action="#" class="form calc-item-checkbox__form">
      <!-- v-for для генерации списка чекбоксов -->
      <label
        v-for="(item, id) in checkboxList"
        :key="id"
        class="custom-checkbox calc-item__form-item"
      >
        <input
          type="radio"
          :name="checkboxList"
          class="custom-checkbox__field"
          :value="item"
          @change="handleCheckboxChange(item)"
        />
        <span
          class="custom-checkbox__content custom-checkbox__content--radio"
        ></span>
        {{ item.name }}
      </label>
    </form>
  </div>
</template>

<script>
export default {
  name: "calc-item-checkbox",
  props: {
    title: {
      type: String,
    },
    // получение списка чекбоксов
    checkboxList: {
      type: Array,
    },
  },
  methods: {
    // отправка выбранного чекбокса родителю
    handleCheckboxChange(item) {
      this.$emit("checkboxSelected", item);
    },
  },
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

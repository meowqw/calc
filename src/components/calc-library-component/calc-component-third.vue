<template>
  <div class="calc-component">
    <div class="calc-component__container">
      <h2 class="calc-component__title title title--h3">
        Расчет стоимости алмазной резки
      </h2>
      <div class="calc-component-content">
        <div class="calc-component-content__left">
          <ul class="list-reset calc-component-content__list">
            <!-- длина реза -->
            <li class="calc-component-content__item">
              <calc-item-input />
            </li>
            <!-- толщина стены -->
            <li class="calc-component-content__item">
              <calc-item-value-slider />
            </li>
            <!-- материал стены -->
            <li class="calc-component-content__item">
              <calc-item-checkbox />
            </li>
            <!-- чекбокс для отображения итемов при условии "без зарезов"-->
            <li class="calc-component-content__item" style="margin: 5px 0 10px 0">
              <label class="custom-checkbox" style="font-weight: 500;">
                <input
                  type="radio"
                  name="Без зарезов"
                  class="custom-checkbox__field"
                />
                <span
                  class="custom-checkbox__content custom-checkbox__content--radio"
                ></span>
                Без зарезов
              </label>
            </li>
            <!-- количество отверстий -->
            <li class="calc-accordion-item__item">
              <calc-item-counter />
            </li>
            <!-- коэффициенты -->
            <li class="calc-accordion-item__item">
              <calc-item-select />
            </li>
          </ul>
        </div>
        <!-- result -->
        <div class="calc-component-content__right">
          <calc-item-result />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcItemResult from "../calc-library-items/calc-item-result";
import calcItemCheckbox from "../calc-library-items/calc-item-checkbox";
import calcItemValueSlider from "../calc-library-items/calc-item-value-slider";
import calcItemInput from "../calc-library-items/calc-item-input";
import calcItemCounter from "../calc-library-items/calc-item-counter.vue";
import calcItemSelect from "../calc-library-items/calc-item-select.vue";

export default {
  name: "calc-component-third",
  components: {
    calcItemResult,
    calcItemCheckbox,
    calcItemValueSlider,
    calcItemInput,
    calcItemCounter,
    calcItemSelect
  },
};
</script>

<style lang="scss" scoped>
.calc-component {
  &__title {
    margin-bottom: 15px;

    @include mobile {
        font-size: 14px;
    }
  }

  &__bottom {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-top: 5px;
  }
}
.calc-component-content {
  display: grid;
  column-gap: 20px;
  grid-column: 13 span;
  grid-template-columns: repeat(12, 1fr);

  &__list {
    display: flex;
    flex-direction: column;
  }

  &__item {
    width: 100%;
  }

  &__left {
    grid-column: 7 span;

    @include tablet {
      grid-column: 12 span;
    }
  }

  &__right {
    grid-column: 5 span;

    @include tablet {
      grid-column: 12 span;
    }
  }
}
</style>

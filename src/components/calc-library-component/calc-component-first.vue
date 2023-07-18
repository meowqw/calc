<template>
  <div class="calc-component">
    <div class="calc-component__container">
      <AccordionList>
        <div class="calc-accordion-item">
          <AccordionItem>
            <template #summary
              ><div class="calc-accordion-item__name">
                Стоимость: 0
                <span>
                  Кол-во:
                  <span>1</span>
                </span>
              </div>
            </template>
            <template #icon>
              <font-awesome-icon :icon="['fas', 'chevron-down']" />
            </template>
            <!-- accordion-content -->
            <div class="calc-accordion-item__content">
              <div class="calc-accordion-item__left">
                <ul class="list-reset calc-accordion-item__list">
                  <!-- коэффициенты -->
                  <li class="calc-accordion-item__item">
                    <calc-item-select />
                  </li>
                  <!-- диаметр коронки -->
                  <li class="calc-accordion-item__item">
                    <calc-item-checkbox />
                  </li>
                  <!-- материал стены -->
                  <li class="calc-accordion-item__item">
                    <calc-item-checkbox />
                  </li>
                  <!-- толщина стены -->
                  <li class="calc-accordion-item__item">
                    <calc-item-value-slider />
                  </li>
                  <!-- количество отверстий -->
                  <li class="calc-accordion-item__item">
                    <calc-item-counter />
                  </li>
                </ul>
              </div>
              <!-- result -->
              <div class="calc-accordion-item__right">
                <calc-item-result />
              </div>
            </div>
          </AccordionItem>
          <!-- btn-delete -->
          <button class="btn-reset btn btn--mini calc-accordion-item__btn">
            <font-awesome-icon :icon="['fa', 'fa-trash']" />
          </button>
        </div>
      </AccordionList>
    </div>
  </div>
</template>

<script>
import calcItemResult from "../calc-library-items/calc-item-result";
import calcItemCheckbox from "../calc-library-items/calc-item-checkbox";
import calcItemValueSlider from "../calc-library-items/calc-item-value-slider";
import calcItemCounter from "../calc-library-items/calc-item-counter";
import calcItemSelect from "../calc-library-items/calc-item-select";

export default {
  name: "calc-component-first",
  components: {
    calcItemResult,
    calcItemCheckbox,
    calcItemValueSlider,
    calcItemCounter,
    calcItemSelect,
  },
};
</script>

<style lang="scss" scoped>
.calc-accordion-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;

  &__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    width: 40px;
    height: 40px;
  }
}
</style>

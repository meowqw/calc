<template>
  <div class="calc-accordion-item">
    <div class="calc-accordion-item__top">
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
                <calc-item-checkbox :title="itemCheckboxTitle"/>
              </li>
              <!-- материал стены -->
              <li class="calc-accordion-item__item">
                <calc-item-checkbox :title="itemCheckboxTitleSecond"/>
              </li>
              <!-- толщина стены -->
              <li class="calc-accordion-item__item">
                <calc-item-value-slider />
              </li>
              <!-- количество отверстий -->
              <li class="calc-accordion-item__item">
                <calc-item-counter />
              </li>
              <!-- длина реза -->
              <li class="calc-accordion-item__item">
                <calc-item-input />
              </li>
            </ul>
          </div>
          <!-- result -->
          <div class="calc-accordion-item__right">
            <calc-item-result-first />
          </div>
        </div>
      </AccordionItem>
      <!-- btn-delete -->
      <button
        class="btn-reset btn btn--mini calc-accordion-item__btn"
        @click="deleteItem"
      >
        <font-awesome-icon :icon="['fa', 'fa-trash']" />
      </button>
    </div>
    <div class="calc-accordion-item__bottom">
      <calc-item-row-result style="display: none" />
    </div>
  </div>
</template>

<script>
import calcItemResultFirst from "../calc-library-items/calc-item-result-first";
import calcItemRowResult from "../calc-library-items/calc-item-row-result";
import calcItemCheckbox from "../calc-library-items/calc-item-checkbox";
import calcItemValueSlider from "../calc-library-items/calc-item-value-slider";
import calcItemCounter from "../calc-library-items/calc-item-counter";
import calcItemSelect from "../calc-library-items/calc-item-select";
import calcItemInput from "../calc-library-items/calc-item-input";

export default {
  name: "calc-accordion-item-first",
  components: {
    calcItemResultFirst,
    calcItemRowResult,
    calcItemCheckbox,
    calcItemValueSlider,
    calcItemCounter,
    calcItemSelect,
    calcItemInput,
  },
  data() {
    return {
        itemCheckboxTitle: "Диаметр коронки",
        itemCheckboxTitleSecond: "Материал стены",
        isVisible: false,
    }
  },
  props: {
    index: Number,
  },
  methods: {
    deleteItem() {
      this.$emit("deleteItem", this.index);
    },
  },
};
</script>

<style lang="scss" scoped>
.calc-accordion-item {
  display: flex;
  flex-direction: column;
  gap: 2px;

  &__top {
    display: flex;
    align-items: flex-start;
    gap: 10px;

    @include mobile {
      gap: 5px;
    }
  }

  &__name {
    display: flex;
    align-items: center;

    span {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 5px;
      border-radius: $border-radius;
      padding: 4px 10px;
      min-width: 25px;
      font-weight: 400;
      font-size: 12px;
      line-height: 16px;
      color: $light-color;
      background-color: $black-color;

      span {
        margin-left: 5px;
        padding: 0;
        min-width: 0;
        font-weight: 500;
      }

      @include tablet {
        min-width: 20px;
      }

      @include mobile {
        margin-left: 0;
        font-size: 12px;
      }
    }

    @include mobile {
      flex-direction: column;
      align-items: flex-start;
    }
  }

  &__content {
    display: grid;
    column-gap: 20px;
    grid-column: 13 span;
    grid-template-columns: repeat(12, 1fr);
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

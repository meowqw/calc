<template>
  <div class="calc-accordion-item">
    <div class="calc-accordion-item__top">
      <AccordionItem>
        <template #summary
          ><div class="calc-accordion-item__name">
            Стоимость: 0
            <span>
              Кол-во:
              <span>{{ counterValue }}</span>
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
                <calc-item-select
                  :options="selectOptions"
                  @valueChanged="handleSelecedValues"
                />
              </li>
              <!-- диаметр коронки -->
              <li class="calc-accordion-item__item">
                <calc-item-checkbox
                  :title="itemCheckboxTitle"
                  :checkboxList="checkboxList"
                  @checkboxSelected="handleCheckboxSelected"
                />
              </li>
              <!-- материал стены -->
              <li class="calc-accordion-item__item">
                <calc-item-checkbox
                  :title="itemCheckboxTitleSecond"
                  :checkboxList="checkboxListSecond"
                  @checkboxSelected="handleCheckboxSelectedSecond"
                />
              </li>
              <!-- толщина стены -->
              <li class="calc-accordion-item__item">
                <calc-item-value-slider
                  @inputChanged="handleValueSliderChanged"
                />
              </li>
              <!-- количество отверстий -->
              <li class="calc-accordion-item__item">
                <calc-item-counter @quantityUpdate="onQuantityUpdated" />
              </li>
            </ul>
          </div>
          <!-- result -->
          <div class="calc-accordion-item__right">
            <calc-item-result-first
              :counterValue="counterValue"
              :valueSlider="valueSlider"
              :selectValues="selectValues"
              :selectedCheckbox="selectedCheckbox"
              :selectedCheckboxSecond="selectedCheckboxSecond"
            />
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

export default {
  name: "calc-accordion-item-first",
  components: {
    calcItemResultFirst,
    calcItemRowResult,
    calcItemCheckbox,
    calcItemValueSlider,
    calcItemCounter,
    calcItemSelect,
  },
  data() {
    return {
      itemCheckboxTitle: "Диаметр коронки",
      itemCheckboxTitleSecond: "Материал стены",
      // переменная для хранения значения счетчика
      counterValue: 1,
      // переменная для хранения значения valueSlider
      valueSlider: 0,
      // переменная для хранения значеня, которые идут в select
      selectOptions: ["one", "two", "three"],
      // переменная для хранения значения, которые идту из select
      selectValues: [],
      // список для чекбоксов
      checkboxList: ["20 см", "30 см", "40 см"],
      // cписок для чекбоксов
      checkboxListSecond: ["Кирпич", "Бетон", "Глина"],
      // выбранный чекбок для диаметра коронки
      selectedCheckbox: null,
      // выбранный чекбок для материала стены
      selectedCheckboxSecond: null,
    };
  },
  computed: {},
  methods: {
    deleteItem() {
      this.$emit("deleteItem", this.index);
    },
    // получение значения счетчика
    onQuantityUpdated(value) {
      this.counterValue = value;
    },
    // обработчик события, вызываемый при изменении значения valueSlider
    handleValueSliderChanged(value) {
      this.valueSlider = value;
    },
    // получение значения select
    handleSelecedValues(value) {
      this.selectValues = value;
    },
    // получение выбранного чекбокса диаметра коронки
    handleCheckboxSelected(item) {
      this.selectedCheckbox = item;
    },
    // получение выбранного чекбокса материала стены
    handleCheckboxSelectedSecond(item) {
      this.selectedCheckboxSecond = item;
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

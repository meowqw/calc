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
              <calc-item-input @inputChanged="handleInputChanged" :title="itemInputTilte" />
            </li>
            <!-- толщина стены -->
            <li class="calc-component-content__item">
              <calc-item-value-slider
                @inputChanged="handleValueSliderChanged"
              />
            </li>
            <!-- материал стены -->
            <li class="calc-component-content__item">
              <calc-item-checkbox
                :title="itemCheckboxTitle"
                :checkboxList="checkboxList"
                @checkboxSelected="handleCheckboxSelected"
              />
            </li>
            <!-- чекбокс для отображения итемов при условии "без зарезов"-->
            <li
              class="calc-component-content__item"
              style="margin: 5px 0 10px 0"
            >
              <label class="custom-checkbox" style="font-weight: 500">
                <input
                  v-model="isActive"
                  type="checkbox"
                  name="Без зарезов"
                  class="custom-checkbox__field"
                />
                <span class="custom-checkbox__content"></span>
                Без зарезов
              </label>
            </li>
            <!-- количество отверстий -->
            <li class="calc-accordion-item__item" v-if="isActive">
              <calc-item-counter @quantityUpdate="onQuantityUpdated" />
            </li>
            <!-- коэффициенты -->
            <li class="calc-accordion-item__item" v-if="isActive">
              <calc-item-select
                :options="selectOptions"
                @valueChanged="handleSelecedValues"
              />
            </li>
          </ul>
        </div>
        <!-- result -->
        <div class="calc-component-content__right">
          <calc-item-result-third
            :inputValue="inputValue"
            :valueSlider="valueSlider"
            :selectedCheckbox="selectedCheckbox"
            :counterValue="counterValue"
            :selectValues="selectValues"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcItemResultThird from "../calc-library-items/calc-item-result-third";
import calcItemCheckbox from "../calc-library-items/calc-item-checkbox";
import calcItemValueSlider from "../calc-library-items/calc-item-value-slider";
import calcItemInput from "../calc-library-items/calc-item-input";
import calcItemCounter from "../calc-library-items/calc-item-counter.vue";
import calcItemSelect from "../calc-library-items/calc-item-select.vue";

export default {
  name: "calc-component-third",
  components: {
    calcItemResultThird,
    calcItemCheckbox,
    calcItemValueSlider,
    calcItemInput,
    calcItemCounter,
    calcItemSelect,
  },
  data() {
    return {
      isActive: false,
      itemInputTilte: "Длина реза",
      itemCheckboxTitle: "Материал стены",
      // переменная для хранения длины реза
      inputValue: 0,
      // переменная для хранения значения valueSlider
      valueSlider: 0,
      // список для чекбоксов
      checkboxList: ["Кирпич", "Бетон", "Глина"],
      // выбранный чекбок для диаметра коронки
      selectedCheckbox: null,
      // переменная для хранения значения счетчика
      counterValue: 1,
      // переменная для хранения значеня, которые идут в select
      selectOptions: ["one", "two", "three"],
      // переменная для хранения значения, которые идту из select
      selectValues: [],
    };
  },
  methods: {
    // обработчик события, вызываемый при изменении значения в input (обрабатываем данные из ребенка)
    handleInputChanged(value) {
      this.inputValue = value;
    },
    // обработчик события, вызываемый при изменении значения valueSlider
    handleValueSliderChanged(value) {
      this.valueSlider = value;
    },
    // получение выбранного чекбокса материала стены
    handleCheckboxSelected(item) {
      this.selectedCheckbox = item;
    },
    // получение значения счетчика
    onQuantityUpdated(value) {
      this.counterValue = value;
    },
    // получение значения select
    handleSelecedValues(value) {
      this.selectValues = value;
    },
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

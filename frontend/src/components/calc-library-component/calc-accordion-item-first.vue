<template>
  <div class="calc-accordion-item">
    <div class="calc-accordion-item__top">
      <AccordionItem :defaultOpened="defaultOpened">
        <template #summary>
          <div class="calc-accordion-item__name">
            Стоимость: {{ result }}
            <span>
              Кол-во:
              <span>{{ counterValue }}</span>
            </span>
          </div>
          <!-- кнопка удаления итема -->
          <button
            class="btn-reset btn btn--mini calc-accordion-item__btn"
            @click="deleteItem"
          >
            <font-awesome-icon :icon="['fa', 'fa-trash']" />
          </button>
        </template>
        <template #icon>
          <font-awesome-icon :icon="['fas', 'chevron-down']" />
        </template>
        <!-- контент итема -->
        <div class="calc-accordion-item__content">
          <div class="calc-accordion-item__left">
            <ul class="list-reset calc-accordion-item__list">
              <!-- коэффициенты -->
              <li class="calc-accordion-item__item">
                <calc-item-select
                  :options="this.GET_COEFFICIENTS"
                  @valueChanged="handleSelecedValues"
                />
              </li>
              <!-- диаметр коронки -->
              <li class="calc-accordion-item__item">
                <calc-item-checkbox
                  :title="itemCheckboxTitle"
                  :checkboxList="this.GET_CROWNS"
                  @checkboxSelected="handleCheckboxSelected"
                />
              </li>
              <!-- материал стены -->
              <li class="calc-accordion-item__item">
                <calc-item-checkbox
                  :title="itemCheckboxTitleSecond"
                  :checkboxList="selectedCheckbox.materials"
                  @checkboxSelected="handleCheckboxSelectedSecond"
                />
              </li>
              <!-- толщина стены -->
              <li class="calc-accordion-item__item">
                <calc-item-value-slider
                  @inputChanged="handleValueSliderChanged"
                  :title="itemValueSliderTitle"
                />
              </li>
              <!-- количество отверстий -->
              <li class="calc-accordion-item__item">
                <calc-item-counter
                  :title="itemCouterTitle"
                  @quantityUpdate="onQuantityUpdated"
                />
              </li>
            </ul>
          </div>
          <div class="calc-accordion-item__right">
            <!-- результат -->
            <calc-item-result-first
              :index="index"
              :counterValue="counterValue"
              :valueSlider="valueSlider"
              :selectValues="selectValues"
              :selectedCheckbox="selectedCheckbox"
              :selectedCheckboxSecond="selectedCheckboxSecond"
              @sendResult="receiveResult"
            />
          </div>
        </div>
      </AccordionItem>
    </div>
    <div class="calc-accordion-item__bottom">
      <calc-item-row-result style="display: none" />
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import calcItemResultFirst from "../calc-result/calc-item-result-first";
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
      itemCouterTitle: "Количество отверстий",
      itemCheckboxTitle: "Диаметр коронки",
      itemCheckboxTitleSecond: "Материал стены",
      itemValueSliderTitle: "Толщина стены (см)",
      // переменная для хранения значения счетчика
      counterValue: 1,
      // переменная для хранения значения valueSlider
      valueSlider: 0,
      // переменная для хранения значения, которые идту из select
      selectValues: [],
      // выбранный чекбок для диаметра коронки
      selectedCheckbox: {},
      // выбранный чекбок для материала стены
      selectedCheckboxSecond: {},
      // результат
      result: 0,
    };
  },
  props: {
    index: {
      type: Number,
    },
    defaultOpened: {
      type: Boolean,
      default: true,
    },
  },
  computed: {
    ...mapGetters(["GET_CROWNS", "GET_COEFFICIENTS"]),
  },
  methods: {
    // событие удаления итема
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
    // получение данных результата
    receiveResult(value) {
      this.result = value;
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
    margin-top: 0;
    width: 30px;
    height: 30px;
  }
}
</style>

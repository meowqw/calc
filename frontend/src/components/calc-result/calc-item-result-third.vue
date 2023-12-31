<template>
  <div class="result">
    <div class="container result__container">
      <div class="result-block block">
        <div class="result-block__top">
          <h3 class="result-block__title">Стоимость</h3>
          <span class="result-block__price">
            {{ resultThirdCalc }}
            руб
          </span>
        </div>
        <ul class="list-reset result-block__list">
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Длина реза:
              <span class="result-item__value"> {{ inputValue }} м</span>
            </div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Толщина стены:
              <span class="result-item__value">{{ valueSlider / 100 }} м</span>
            </div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Квадратных метров:
              <span class="result-item__value"
                >{{ Math.round(inputValue * (valueSlider / 100)) }} м2</span
              >
            </div>
            <div class="result-item__price">
              1 м2 = {{ getSettingCutting }} руб
            </div>
          </li>
          <li class="result-block__item result-item" v-if="isActive">
            <div class="result-item__name">
              Количество отверстий:
              <span class="result-item__value"
                >{{ counterValue }} (Цена за 1 {{ getSettingHole }} р.)</span
              >
            </div>
            <!-- <div class="result-item__price">{{ counterValue * GET_SETTINGS }} руб</div> -->
          </li>
          <li class="result-block__item result-item" v-if="isActive">
            <div class="result-item__name">
              Коэффициенты:
              <span
                class="result-item__value"
                v-for="(item, index) in selectValues"
                :key="index"
                >{{ item.name }} ({{ item.value }})</span
              >
            </div>
            <div class="result-item__price">
              {{ sumValueSelectValues }}
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";

export default {
  name: "calc-item-result",
  props: {
    // чекбокс "без зарезов"
    isActive: {
      type: Boolean,
    },
    // длина реза
    inputValue: {
      type: [Number, String],
      required: true,
      return: 0,
    },
    // толщина стены
    valueSlider: {
      type: Number,
      required: true,
      return: 0,
    },
    // материал стены
    // selectedCheckbox: {
    //   type: String,
    //   return: null,
    // },
    // количество отверстий
    counterValue: {
      type: Number,
      required: true,
    },
    // коэффициенты
    selectValues: {
      type: Array,
    },
  },
  computed: {
    ...mapGetters(["GET_SETTINGS"]),

    // получить значение настройки для отверстий
    getSettingHole() {
      if (this.GET_SETTINGS.length) {
        return Number(this.GET_SETTINGS.find((el) => el.code === "hole").value);
      } else {
        return 0;
      }
    },

    // получить значение настройки для цена за 1 м2
    getSettingCutting() {
      if (this.GET_SETTINGS.length) {
        return Number(
          this.GET_SETTINGS.find((el) => el.code === "cutting").value
        );
      } else {
        return 0;
      }
    },

    // получаем наибольший коэффициент
    maxStartPriceSelectValues() {
      return this.selectValues.reduce(
        (startPrice, item) => Math.max(startPrice, item.startPrice),
        0
      );
    },

    // получаем сумму value всех коэффициентов
    sumValueSelectValues() {
      return this.selectValues.reduce((sum, item) => sum + item.value, 0);
    },

    // логика отправки значения без зарезов, либо с зарезами
    resultThirdCalc() {
      if (this.counterValue < 1) {
        // формула
        return Math.round(
          this.inputValue * (this.valueSlider / 100) * this.getSettingCutting
        );
      } else if (this.sumValueSelectValues > 0) {
        return (
          // формула
          Math.round(
            this.inputValue *
              (this.valueSlider / 100) *
              this.getSettingCutting *
              this.sumValueSelectValues +
              this.counterValue * this.getSettingHole
          )
        );
      } else if (this.inputValue > 0 && this.valueSlider > 0) {
        return (
          // формула
          Math.round(
            this.inputValue *
              (this.valueSlider / 100) *
              this.getSettingCutting +
              this.counterValue * this.getSettingHole
          )
        );
      } else {
        return 0;
      }
    },
  },
  methods: {
    ...mapMutations(["UPDATE_RESULT_THIRD_CALC", "UPDATE_MAX_COEF"]),

    // отправка значения в мутацию
    sendResultThirdCalc() {
      this.UPDATE_RESULT_THIRD_CALC(this.resultThirdCalc);
    },
  },
  watch: {
    // отслеживание значения в компоненте и обновление в мутации
    resultThirdCalc() {
      this.sendResultThirdCalc();
    },
    // обновляем данные отслеживая изменения в массиве
    selectValues: {
      deep: true, // Глубокое наблюдение за изменением в массиве
      handler() {
        this.UPDATE_MAX_COEF(this.maxStartPriceSelectValues);
      },
    },
  },
};
</script>

<style lang="scss" scoped>
.result {
  &__container {
    padding: 0;
  }

  &__btn {
    margin-top: 20px;
    padding: 15px 20px;
    width: 100%;
    font-size: 20px;

    @include small-tablet {
      margin-top: 10px;
    }
  }

  @include tablet {
    margin-top: 5px;
  }
}

.result-block {
  &__top {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    margin-bottom: 15px;

    @include tablet {
      margin-bottom: 20px;
    }

    @include small-tablet {
      align-items: center;
      margin-bottom: 15px;

      &--hero {
        flex-flow: row;
        flex-wrap: wrap;
        align-items: center;
      }
    }
  }

  &__title {
    margin: 0;
    margin-right: 10px;
    width: 100%;
    font-weight: 500;
    font-size: 16px;
    line-height: 117%;

    &--total {
      display: inline-block;
      font-weight: 700;
    }

    @include tablet {
      font-size: 14px;
    }

    @include mobile {
      font-size: 14px;
    }
  }

  &__price {
    margin-left: 7px;
    border-radius: $border-radius;
    padding: 5px 10px;
    font-weight: 500;
    font-size: 16px;
    line-height: 117%;
    white-space: nowrap;
    color: $light-color;
    background: #d74b4b;

    @include tablet {
      font-size: 20px;
    }

    @include small-tablet {
      font-size: 18px;
    }

    @include mobile {
      font-size: 16px;
    }

    &--total {
      margin-right: 0;
      font-weight: 700;
      background-color: #00930f;
    }
  }

  &__add {
    border-radius: $border-radius;
    padding: 4px 10px;
    font-weight: 400;
    font-size: 12px;
    white-space: nowrap;
    color: $light-color;
    background-color: $black-color;

    span {
      font-weight: 700;
    }

    @include small-tablet {
      padding: 8px 15px;
    }
  }

  &__bottom {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;

    @include mobile {
      margin-right: 10px;
    }
  }

  &__total {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    @include mobile {
      flex-wrap: nowrap;
    }
  }

  &__btn-estimate {
    width: 120px;
  }
}

.result-item {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 20px;
  padding-bottom: 12px;

  @include tablet {
    margin-bottom: 15px;
  }

  @include mobile {
    margin-bottom: 10px;
  }

  &:not(:last-child) {
    border-bottom: 2px solid $border-color;
  }

  @include small-tablet {
    align-items: flex-start;
  }

  &__name {
    display: flex;
    flex-direction: column;
    font-weight: 400;
    font-size: 14px;
    line-height: 112.5%;
  }

  &__value {
    margin-right: 0px;
    margin-left: 0;
    font-weight: 700;

    &:not(:last-child) {
      margin-bottom: 5px;
    }

    &:first-child {
      margin-top: 5px;
    }
  }

  &__price {
    margin: 2px 0;
    margin-left: 10px;
    border-radius: 15px;
    padding: 7px 10px;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    white-space: nowrap;
    color: $light-color;
    background-color: $dark-color;

    @include small-tablet {
      margin-left: 15px;
    }

    &--perimeter {
      @include mobile {
        margin-left: 0;
      }
    }
  }

  &__right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;

    &:not(:last-child) {
      margin-bottom: 5px;
    }

    @include mobile {
      align-items: flex-start;
      margin-top: 5px;
    }
  }

  &--perimeter {
    @include mobile {
      flex-direction: column;
    }
  }
}
</style>

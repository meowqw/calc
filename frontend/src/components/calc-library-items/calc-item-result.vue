<template>
  <div class="result">
    <div class="container result__container">
      <div class="result-block block">
        <div class="result-block__top">
          <h3 class="result-block__title">Стоимость бурения</h3>
          <span class="result-block__price">{{ resultFirstCalc }} руб</span>
        </div>
        <div class="result-block__top">
          <h3 class="result-block__title">Стоимость периметра</h3>
          <span class="result-block__price">{{ resultSecondCalc }} руб</span>
        </div>
        <div class="result-block__top">
          <h3 class="result-block__title">Стоимость резки</h3>
          <span class="result-block__price">{{ resultThirdCalc }} руб</span>
        </div>
        <ul class="list-reset result-block__list">
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Дополнительные работы:
              <span
                class="result-item__value"
                v-for="(item, id) in getExtraWorks"
                :key="id"
                >{{ item.name }} ({{ item.quantity }})</span
              >
            </div>
            <div class="result-item__price">{{ totalCostExtraWorks }} руб</div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Удаленность от МКАД:
              <span class="result-item__value">50 км</span>
            </div>
            <div class="result-item__price">700 руб</div>
          </li>
        </ul>
        <!-- итоговая стоимость-->
        <div class="result-block__total">
          <h3 class="result-block__title result-block__title--total">
            Итоговая стоимость:
          </h3>
          <span class="result-block__price result-block__price--total"
            >{{ finalResult }} руб</span
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "calc-item-result",
  computed: {
    ...mapGetters([
      "GET_RESULT_FIRST_CALC",
      "GET_RESULT_SECOND_CALC",
      "GET_RESULT_THIRD_CALC",
      "GET_EXTRA_WORKS",
      "GET_SETTINGS"
    ]),
    // получение значения первого калькулятора
    resultFirstCalc() {
      return this.GET_RESULT_FIRST_CALC;
    },
    // получение значения второго калькулятора
    resultSecondCalc() {
      return this.GET_RESULT_SECOND_CALC;
    },
    // получение значения третьего калькулятора
    resultThirdCalc() {
      return this.GET_RESULT_THIRD_CALC;
    },
    // получаем элементы массива доп.работ, количество которых > 0
    getExtraWorks() {
      return this.GET_EXTRA_WORKS.filter((item) => item.quantity > 0);
    },
    // вычисляем общую стоимость дополнительных работ
    totalCostExtraWorks() {
      return this.getExtraWorks.reduce(
        (total, item) => total + item.cost * item.quantity,
        0
      );
    },
    // вычисляем итоговую стоимость с учетом минимального значения
    finalResult() {
      const rawResult =
        this.resultFirstCalc +
        this.resultSecondCalc +
        this.resultThirdCalc +
        this.totalCostExtraWorks;

      // Минимальное значение для итога
      const minResult = this.GET_SETTINGS.startPrice;

      // Если суммарная стоимость меньше минимальной, вернем минимальную стоимость, 
      // иначе вернем суммарную стоимость
      return rawResult < minResult ? minResult : rawResult;
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
    margin-right: 7px;
    margin-left: 0;
    font-weight: 700;

    &:not(:last-child) {
      margin-bottom: 8px;
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

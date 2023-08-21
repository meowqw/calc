<template>
  <div class="result">
    <div class="container result__container">
      <div class="result-block block">
        <div class="result-block__top">
          <h3 class="result-block__title">Стоимость</h3>
          <span class="result-block__price">{{ resultSecondCalc }} руб</span>
        </div>
        <ul class="list-reset result-block__list">
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Кол-во отверстий
              <span class="result-item__value">{{ quantityHoles }}</span>
            </div>
            <!-- <div class="result-item__price">
              отверстие: {{ quantityHoles }} руб
            </div> -->
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Периметр проема
              <span class="result-item__value">{{ inputValue }} см</span>
            </div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Материал стены
              <span class="result-item__value">
                {{ selectedCheckbox.name }}
              </span>
            </div>
            <div class="result-item__price">
              {{ selectedCheckbox.cost }} руб
            </div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Толщина стены
              <span class="result-item__value">
                {{ valueSlider }}
              </span>
            </div>
          </li>
          <li class="result-block__item result-item">
            <div class="result-item__name">
              Количество проемов
              <span class="result-item__value">{{ counterValue }} см</span>
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
    index: {
      type: Number,
    },
    // периметр проема
    inputValue: {
      type: [Number, String],
      required: true,
    },
    // толщина стены
    valueSlider: {
      type: Number,
      required: true,
      return: 0,
    },
    // материал стены
    selectedCheckbox: {
      type: Object,
      return: {},
    },
    // количество проемов
    counterValue: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      id: this.index,
    };
  },
  computed: {
    ...mapGetters(["GET_CROWNS_TWO"]),

    resultSecondCalc() {
      if (this.counterValue === 0) {
        // формула
        return Math.round(
          this.quantityHoles * (this.valueSlider * this.selectedCheckbox.cost)
        );
      } else {
        // формула
        return Math.round(
          this.quantityHoles *
            (this.valueSlider * this.selectedCheckbox.cost) *
            this.counterValue
        );
      }
    },

    // количество отверстий
    quantityHoles() {
      if (this.inputValue < 7) {
        return 1;
      } else {
        return Math.round(this.inputValue / (this.GET_CROWNS_TWO.size / 10));
      }
    },
  },
  methods: {
    ...mapMutations(["UPDATE_RESULT_SECOND_CALC"]),

    // отправка значения в мутацию
    sendResultSecondCalc() {
      this.$emit("sendResult", this.index, this.resultSecondCalc);
      let itemResultObject = {};
      itemResultObject[this.id] = this.resultSecondCalc;

      this.UPDATE_RESULT_SECOND_CALC(itemResultObject);
    },
  },
  watch: {
    // отслеживание значения в компоненте и обновление в мутации
    resultSecondCalc() {
      this.sendResultSecondCalc();
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

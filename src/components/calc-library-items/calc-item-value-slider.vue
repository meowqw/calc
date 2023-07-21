<template>
  <div class="calc-item-value-slider calc-item block block--second">
    <h3 class="calc-item__title title title--h3">Толщина стены</h3>
    <form class="calc-item-value-slider__form form" @submit.prevent>
      <div class="range">
        <input
          class="range__slider"
          id="slider"
          max="200"
          min="0"
          type="range"
        />
        <label class="form__label label range__label" for="amount">
          <input
            class="input-reset input calc-item__input form__input range__input"
            id="amount"
            type="number"
          />
          <div class="tooltip">
            <font-awesome-icon class="icon" :icon="['fas', 'circle-info']" />
            <div class="tooltip__text">Сантиметров</div>
          </div>
        </label>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "calc-item-value-slider",

  computed: {},
  methods: {},
};
</script>

<style lang="scss" scoped>
.range {
  display: flex;
  align-items: center;

  @at-root {
    &__slider {
      appearance: none;
      margin: 0;
      margin-right: 20px;
      width: 250px;

      &::-webkit-slider-runnable-track {
        margin: 5px 0;
        border-radius: $border-radius;
        height: 5px;
        background-color: $dark-color;
      }

      &::-moz-range-track {
        border-radius: $border-radius;
        height: 5px;
        background-color: $dark-color;
      }

      &::-moz-focus-outer {
        border: 0;
      }

      &::-ms-track {
        border-radius: $border-radius;
        height: 5px;
        background-color: $dark-color;
      }

      &::-webkit-slider-thumb {
        appearance: none;
        margin-top: -9px;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background-color: $accent-color;
        cursor: pointer;
      }

      &::-moz-range-thumb {
        appearance: none;
        margin-top: -9px;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background-color: $accent-color;
        cursor: pointer;
      }

      &::-ms-thumb {
        margin: 0;
      }

      &:focus {
        outline: none;
      }

      @include mobile {
        width: 100%;
      }
    }

    &__amount {
      width: 100px;

      &--big {
        width: 100%;
      }
    }
  }

  &__label {
    max-width: 90px;
  }

  @include mobile {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
}
</style>

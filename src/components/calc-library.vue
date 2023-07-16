<template>
  <div class="container calculator__container">
    <div class="calculator__left">
      <calc-item-result />
    </div>
    <div class="calculator__right">
      <div class="calculator__right-top">
        <ul class="list-reset calculator__nav">
          <li class="calculator__nav-item">
            <button
              class="calculator__nav-btn btn-reset btn btn--mini"
              type="button"
            >
              Стоимость
            </button>
          </li>
          <li class="calculator__nav-item">
            <button
              class="calculator__nav-btn btn-reset btn btn--mini"
              type="button"
            >
              Периметр
            </button>
          </li>
          <li class="calculator__nav-item">
            <button
              class="calculator__nav-btn btn-reset btn btn--mini"
              type="button"
            >
              Алмазная резка
            </button>
          </li>
        </ul>
        <div class="calculator__content">
          <router-view />
        </div>
      </div>
      <calc-item-addition />
      <div class="calculator__right-bottom">
        <calc-item-sale />
        <calc-item-distance />
      </div>
    </div>
  </div>
</template>

<script>
import calcItemAddition from "@/components/calc-library-items/calc-item-addition";
import calcItemDistance from "@/components/calc-library-items/calc-item-distance";
import calcItemResult from "@/components/calc-library-items/calc-item-result";
import calcItemSale from "@/components/calc-library-items/calc-item-sale";

export default {
  name: "calc-library",
  components: {
    calcItemAddition,
    calcItemDistance,
    calcItemResult,
    calcItemSale,
  },
};
</script>

<style lang="scss" scoped>
.calculator {
  &__container {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 20px;

    @media (max-width: 1240px) {
      display: flex;
      flex-direction: column-reverse;
      gap: 0;
    }
  }

  &__right-top {
    margin-bottom: 30px;
    border: 1px solid $border-color;
    border-radius: $border-radius;
  }

  &__nav {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-end;
    border-radius: $border-radius $border-radius 0 0;
    padding: $pp;
    background-color: $light-gray-color;

    &-item {
      &:not(:last-child) {
        margin-right: 20px;

        @include mobile {
          margin-right: 0;
        }
      }
    }

    &-title {
      margin: 0;
      font-weight: 700;
      font-size: 14px;
      color: $dark-color;

      @include mobile {
        display: none;
      }
    }

    &-btn--active {
      box-shadow: $shadow-btn--active;

      &:focus {
        background-color: $accent-color;
      }
    }

    @include mobile {
      column-gap: 20px;
      row-gap: 10px;
    }
  }

  &__content {
    padding: 15px;

    @include mobile {
      padding: 0;
    }
  }

  &__right-bottom {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 20px;

    @include small-tablet {
      grid-template-columns: auto;
      gap: 0;
    }
  }
}
</style>

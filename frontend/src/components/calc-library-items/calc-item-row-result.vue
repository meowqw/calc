<template>
  <div class="row-result">
    <ul class="list-reset row-result__list">
      <li class="row-result__item">
        <div class="row-result__name">
          <span class="row-result__name-text">Д-тр коронки:</span>
          <font-awesome-icon class="icon" :icon="['far', 'circle']"> : </font-awesome-icon>
          <span class="row-result__value">0 см</span>
        </div>
      </li>
      <li class="row-result__item">
        <div class="row-result__name">
          <span class="row-result__name-text">Т-на стены:</span>
          <font-awesome-icon class="icon" :icon="['fas', 'grip-lines-vertical']">
            :
          </font-awesome-icon>
          <span class="row-result__value">0 см</span>
        </div>
      </li>
      <li class="row-result__item">
        <div class="row-result__name">
          <span class="row-result__name-text">М-ал стены:</span>
          <font-awesome-icon class="icon" :icon="['fas', 'diamond']"> : </font-awesome-icon>
          <span class="row-result__value">Бетон</span>
        </div>
      </li>
      <li class="row-result__item">
        <div class="row-result__name">
          <span class="row-result__name-text">Коэф:</span>
          <font-awesome-icon class="icon" :icon="['fas', 'ruler-vertical']">
            :
          </font-awesome-icon>
          <span class="row-result__value">Глубина отверстий менее 20 см</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "calc-item-row-result",
};
</script>

<style lang="scss" scoped>
.row-result {
  &__list {
    display: flex;
    flex-wrap: wrap;
    padding-top: 5px;
  }

  &__item {
    margin-bottom: 0;
    padding-bottom: 2px;

    &:not(:last-child) {
      margin-right: 6px;
      margin-bottom: 0;
      border-right: 1px solid var(--border-color);
      border-bottom: 0;
      padding-right: 5px;
    }

    .icon {
      display: none;

      @include small-tablet {
        display: flex;
        align-items: center;
        font-size: 12px;
      }

      @include mobile {
        font-size: 12px;
      }
    }
  }

  &__name {
    display: flex;
    flex-direction: row;
    align-items: center;
    font-size: 12px;

    &-text {
      @include small-tablet {
        display: none;
      }
    }

    &:not(:last-child) {
      margin-bottom: 0;
    }
  }

  &__value {
    margin-right: 0;
    margin-left: 4px;
    font-weight: 500;
    font-size: 12px;
    white-space: break-spaces;
  }
}
</style>

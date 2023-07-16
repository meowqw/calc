<template>
  <div class="calc-item container block">
    <h2 class="calc-item__title title title--h3">Дополнительные работы</h2>
    <form action="#" class="form">
      <button type="button" class="btn-reset accordion accordion--btn">
        Дополнительные работы
      </button>
      <ul class="list-reset calc-item__list panel" id="coefList0" style="">
        <li class="addition__item">
          <label class="label addition__label" for="coef2">
            Алмазное сверление с водосборным кольцом пылесосом
          </label>
          <div class="calc">
            <button class="btn-reset btn calc__btn">
              <font-awesome-icon :icon="['fas', 'minus']" />
            </button>
            <input
              class="input-reset calc__input input"
              type="number"
              pk="2"
              price="1.1"
              id="coef2"
              value="Алмазное сверление с водосборным кольцом пылесосом"
            />
            <button class="btn-reset btn calc__btn">
              <font-awesome-icon :icon="['fas', 'plus']" />
            </button>
          </div>
        </li>
      </ul>
    </form>
    <AccordionList>
      <AccordionItem>
        <template #summary>Item summary</template>
        <template #icon>
          <font-awesome-icon :icon="['fas', 'chevron-down']" />
        </template>
        <ul class="list-reset calc-item__list" id="coefList0" style="">
          <li class="addition__item">
            <label class="label addition__label" for="coef2">
              Алмазное сверление с водосборным кольцом пылесосом
            </label>
            <div class="calc">
              <button class="btn-reset btn calc__btn">
                <font-awesome-icon :icon="['fas', 'minus']" />
              </button>
              <input
                class="input-reset calc__input input"
                type="number"
                pk="2"
                price="1.1"
                id="coef2"
                value="Алмазное сверление с водосборным кольцом пылесосом"
              />
              <button class="btn-reset btn calc__btn">
                <font-awesome-icon :icon="['fas', 'plus']" />
              </button>
            </div>
          </li>
        </ul>
      </AccordionItem>
    </AccordionList>
  </div>
</template>

<script>
export default {
  name: "calc-item-addition",
};
</script>

<style lang="scss" scoped>
.addition {
  .accordion--btn {
    margin-bottom: 10px;
  }

  &__list {
    display: flex;
    flex-direction: column;
    border-radius: $border-radius;
    background-color: $light-color;

    @include mobile {
      padding: 0;
    }
  }

  &__item {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    border: 1px solid $border-color;
    border-radius: $border-radius;
    padding: 5px 10px;
    box-shadow: $shadow-block;
    font-size: 14px;

    &:not(:last-child) {
      margin-bottom: 5px;
    }

    &:last-child {
      margin-bottom: 10px;

      @include mobile {
        margin-bottom: 0;
      }
    }

    @include mobile {
      flex-direction: column;
      align-items: center;
      padding: 7px 15px;
    }
  }

  &__title {
    margin-bottom: 15px;

    @include mobile {
      margin-bottom: 10px;
    }
  }

  &__calc {
    min-width: 150px;
  }
}

.calc {
  display: flex;
  max-width: 160px;

  &__label {
    margin-right: 10px;

    @include small-tablet {
      font-size: 14px;
    }

    @include mobile {
      margin-right: 0;
      margin-bottom: 5px;
      font-size: 13px;
      text-align: center;
    }
  }

  &__input {
    margin: 0 10px;
    padding: 10px 12px;
    font-weight: 700;
    font-size: 14px;
    text-align: center;
  }

  &__btn {
    padding: 0;
    width: 34px;
    height: 34px;
    font-size: 18px;
  }
}
</style>

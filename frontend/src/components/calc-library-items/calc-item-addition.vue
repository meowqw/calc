<template>
  <div class="calc-item container block">
    <h2 class="calc-item__title title title--h3">Дополнительные работы</h2>
    <AccordionList>
      <AccordionItem>
        <template #summary>Дополнительные работы</template>
        <template #icon>
          <font-awesome-icon :icon="['fas', 'chevron-down']" />
        </template>
        <ul class="list-reset addition__list">
          <li
            v-for="(item, id) in this.GET_EXTRA_WORKS"
            :key="id"
            class="addition__item"
          >
            <span class="label addition__label">
              {{ item.name }}
            </span>
            <calc-counter />
          </li>
        </ul>
      </AccordionItem>
    </AccordionList>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import calcCounter from "../calc-counter.vue";

export default {
  name: "calc-item-addition",
  components: {
    calcCounter,
  },
  computed: {
    ...mapGetters(["GET_EXTRA_WORKS"]),
  },
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
      font-size: 12px;
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
</style>

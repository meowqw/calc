<template>
  <div class="calc-component">
    <div class="calc-component__container">
      <h2 class="calc-component__title title title--h3">
        Расчет стоимости бурения
      </h2>
      <AccordionList :openMultipleItems="openMultipleItems">
        <calc-accordion-item-first
          v-for="(item, index) in ACCORDION_LIST_FIRST"
          :key="index"
          :index="index"
          :defaultOpened="defaultOpened"
          @deleteItem="deleteItem(index)"
          @addNewItem="addNewAccordionItem(item)"
        />
      </AccordionList>
      <div class="calc-component__bottom">
        <button class="btn-reset btn" @click="addNewAccordionItem()">
          <font-awesome-icon :icon="['fas', 'plus']" />
          Добавить отверстие
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
import calcAccordionItemFirst from "./calc-accordion-item-first.vue";

export default {
  name: "calc-component-first",
  components: {
    calcAccordionItemFirst,
  },
  data() {
    return {
      defaultOpened: false,
      openMultipleItems: false,
    };
  },
  computed: {
    ...mapGetters(["ACCORDION_LIST_FIRST"]),
  },
  methods: {
    ...mapMutations([
      "ADD_ITEM_FIRST_ACCORDION_LIST",
      "REMOVE_ITEM_FIRST_ACCORDION_LIST",
    ]),
    // функция добавления нового элемента в список
    addNewAccordionItem(item) {
      this.ADD_ITEM_FIRST_ACCORDION_LIST(item, 1);
      this.defaultOpened = true;

    },
    // логика удаления элемента из списка
    deleteItem(index) {
      this.REMOVE_ITEM_FIRST_ACCORDION_LIST(index, 1);
    },
  },
};
</script>

<style lang="scss" scoped>
.calc-component {
  &__title {
    margin-bottom: 15px;

    @include mobile {
      margin-bottom: 10px;
      font-size: 14px;
    }
  }

  &__bottom {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-top: 10px;
  }
}
</style>

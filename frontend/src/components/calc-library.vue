<template>
  <div class="container calculator__container">
    <div class="calculator__left">
      <calc-item-result />
      <div class="calculator__left-bottom">
        <button class="btn-reset btn" @click="isModalOpen = true">
          <font-awesome-icon :icon="['fas', 'file']" />
          Смета
        </button>
      </div>
    </div>
    <div class="calculator__right">
      <!-- tabs -->
      <tabs
        :options="{ useUrlFragment: false }"
        nav-item-class="nav-item tabs-component-tabs"
      >
        <tab name="Бурение">
          <calc-component-first />
        </tab>
        <tab name="Периметр">
          <calc-component-second />
        </tab>
        <tab name="Резка" :is-disabled="false">
          <calc-component-third />
        </tab>
      </tabs>
      <calc-item-addition />
      <div class="calculator__right-bottom">
        <calc-item-sale />
        <calc-item-distance />
      </div>
    </div>
  </div>

  <calc-modal :is-open="isModalOpen" @close="isModalOpen = false" />
</template>

<script>
import { mapActions } from "vuex";
import calcItemAddition from "@/components/calc-library-items/calc-item-addition";
import calcItemDistance from "@/components/calc-library-items/calc-item-distance";
import calcItemResult from "@/components/calc-library-items/calc-item-result";
import calcItemSale from "@/components/calc-library-items/calc-item-sale";
import calcComponentFirst from "@/components/calc-library-component/calc-component-first";
import calcComponentSecond from "@/components/calc-library-component/calc-component-second";
import calcComponentThird from "@/components/calc-library-component/calc-component-third";
import calcModal from "./calc-modal.vue";

export default {
  name: "calc-library",
  components: {
    calcItemAddition,
    calcItemDistance,
    calcItemResult,
    calcItemSale,
    calcComponentFirst,
    calcComponentSecond,
    calcComponentThird,
    calcModal,
  },
  data() {
    return {
      isModalOpen: false,
    };
  },
  methods: {
    ...mapActions([
      "FETCH_CROWNS",
      "FETCH_CROWNS_TWO",
      "FETCH_MATERIALS",
      "FETCH_COEFFICIENTS",
      "FETCH_EXTRA_WORKS",
      "FETCH_SETTINGS",
    ]),
  },
  mounted() {
    this.FETCH_CROWNS();
    this.FETCH_CROWNS_TWO();
    this.FETCH_MATERIALS();
    this.FETCH_COEFFICIENTS();
    this.FETCH_EXTRA_WORKS();
    this.FETCH_SETTINGS();
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

  &__left-bottom {
    display: flex;
    justify-content: flex-end;

    @include big-desktop {
      margin-bottom: 20px;
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

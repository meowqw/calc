<template>
  <div class="container calculator__container">
    <div class="calculator__left">
      <calc-item-result />
    </div>
    <div class="calculator__right">
      <!-- tabs -->
      <tabs :options="{ useUrlFragment: false }" nav-item-class="nav-item tabs-component-tabs">
        <tab name="Бурение">
          <calc-component-first/>
        </tab>
        <tab name="Периметр">
           <calc-component-second/>
        </tab>
        <tab name="Резка" :is-disabled="false">
            <calc-component-third/>
        </tab>
    </tabs>
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
import calcComponentFirst from "@/components/calc-library-component/calc-component-first";
import calcComponentSecond from "@/components/calc-library-component/calc-component-second";
import calcComponentThird from "@/components/calc-library-component/calc-component-third";

export default {
  name: "calc-library",
  components: {
    calcItemAddition,
    calcItemDistance,
    calcItemResult,
    calcItemSale,
    calcComponentFirst,
    calcComponentSecond,
    calcComponentThird
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

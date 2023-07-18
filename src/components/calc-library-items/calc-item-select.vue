<template>
  <div class="calc-item container block block--second">
    <h3 class="calc-item__title title title--h3">Коэффициенты</h3>
    <Multiselect v-model="value" :options="options" mode="tags" />
  </div>
</template>

<script>
export default {
  name: "calc-item-select",
  data() {
    return {
      value: null,
      options: ["Один", "Два", "Три"],
    };
  },
};
</script>

<style lang="scss" scoped></style>

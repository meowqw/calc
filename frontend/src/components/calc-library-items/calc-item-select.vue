<template>
  <div class="calc-item container block block--second">
    <h3 class="calc-item__title title title--h3">Коэффициенты</h3>
    <Multiselect
      v-model="value"
      :options="options"
      :searchable="true"
      :close-on-select="false"
      label="name"
      mode="tags"
    />
  </div>
</template>

<script>
export default {
  name: "calc-item-select",
  data() {
    return {
      value: null,
    };
  },
  props: {
    options: {
      type: Array,
    },
  },
  methods: {
    // отправка выбранных значений родителю
    emitValueToParent() {
      this.$emit("valueChanged", this.value);
    },
  },
  watch: {
    // отслеживание изменения значения value
    value() {
      this.emitValueToParent();
    },
  },
};
</script>

<style lang="scss" scoped></style>

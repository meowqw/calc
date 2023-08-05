<template>
  <div :class="['modal', { open: isOpen }]">
    <div class="close" @click="closeModal"></div>
    <div class="modal__container container">
      <div class="modal__content">
        <div class="modal__top">
          <h2 class="title title--h2 modal__title">Добавление клиента</h2>
          <button class="btn-reset modal__btn" @click="closeModal">
            <font-awesome-icon class="icon" :icon="['fas', 'xmark']" />
          </button>
        </div>
        <div v-if="$route.path === '/'">
          <calc-add-client />
        </div>
        <div v-if="$route.path === '/calc-library'">
          <calc-table-estimate />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcAddClient from "@/components/calc-modal-content/calc-add-client";
import calcTableEstimate from "@/components/calc-modal-content/calc-table-estimate";

export default {
  name: "calc-modal",
  components: {
    calcAddClient,
    calcTableEstimate,
  },
  props: {
    isOpen: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    closeModal() {
      this.$emit("close");
    },
  },
};
</script>

<style lang="scss" scoped>
.modal {
  position: fixed;
  left: 0;
  bottom: -100%;
  z-index: 9999;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  transition: bottom 0.2s ease-in-out;

  &.open {
    bottom: 0;
  }

  &__container {
    z-index: 10;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: auto;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    border-radius: $border-radius $border-radius 0 0;
    width: min-content;
    height: auto;
    box-shadow: $box-shadow;
    background-color: $light-color;
  }

  &__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  &__content {
    margin-top: 15px;
    margin-bottom: 30px;
  }

  &__title {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
  }

  &__btn {
    .icon {
      font-size: 18px;
    }
  }

  .close {
    z-index: 1;
    position: relative;
    width: 100%;
    height: 100%;
  }
}
</style>

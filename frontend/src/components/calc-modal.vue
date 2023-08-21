<template>
  <div :class="['modal', { open: isOpen }]">
    <div class="close" @click="closeModal"></div>
    <div class="modal__container container">
      <div class="modal__content">
        <div class="modal__top">
          <!-- <h2 class="title title--h2 modal__title">Добавление клиента</h2> -->
          <button class="btn-reset modal__btn" @click="closeModal">
            <font-awesome-icon class="icon" :icon="['fas', 'xmark']" />
          </button>
        </div>
        <!-- заказы выбранного клиента -->
        <div v-if="selectedClient" class="modal-orders">
          <h3>Заказы клиента: {{ selectedClient.fullName }}</h3>
          <table>
              <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Время заказа</th>
                <th scope="col">Заметка</th>
                <th scope="col">Адрес</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(order, index) in selectedClient.orders" :key="index">
                <td></td>
                <td data-label="Дата:&nbsp;">
                  {{ order.date }}
                </td>
                <td data-label="Время:&nbsp;">
                  {{ order.time }}
                </td>
                <td data-label="Заметка:&nbsp;">
                  {{ order.note }}
                </td>
                <td data-label="Адрес:&nbsp;">
                  {{ order.address }}
                </td>
                <td data-label="">
                  <button class="btn-reset btn btn--mini">Калькулятор</button>
                </td>
                <td>
                  <button class="btn-reset btn btn--mini">
                    <font-awesome-icon :icon="['fas', 'xmark']" />
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div v-if="$route.path === '/calc-library'">
          <calc-table-estimate />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import calcTableEstimate from "@/components/calc-modal-content/calc-table-estimate";

export default {
  name: "calc-modal",
  components: {
    calcTableEstimate,
  },
  props: {
    isOpen: {
      type: Boolean,
      default: false,
    },
    selectedClient: Object,
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
  bottom: -120%;
  z-index: 9999;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  transition: bottom 0.2s ease-in-out;

  &.open {
    bottom: 0;
    overflow: auto;
  }

  &__container {
    z-index: 10;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    overflow: auto;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    border-radius: $border-radius $border-radius 0 0;
    width: 100%;
    height: 100%;
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
    width: 100%;
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

.modal-orders {
  width: 100%;
}
</style>

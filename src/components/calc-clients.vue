<template>
  <section class="clients">
    <div class="clients__container container">
      <div class="clients__top">
        <button class="btn-reset btn" @click="isModalOpen = true">
          <font-awesome-icon :icon="['fas', 'plus']" />
          Добавить клиента
        </button>
      </div>
      <div class="clients-base">
        <div class="clients-base__top">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">№</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">Почта</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Заказы</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <!-- item -->
              <tr>
                <td data-label="№">1</td>
                <td data-label="Имя пользователя">Имя пользователя</td>
                <td data-label="Почта">
                  <a href="mailto:mail@mail.com" class="table__link"
                    >mail@mail.com</a
                  >
                </td>
                <td data-label="Номер телефона">
                  <a href="tel:89234583593" class="table__link">89235622848</a>
                </td>
                <td data-label="Заказы">
                  <button
                    :class="['btn-reset btn btn--mini', { active: showOrders }]"
                    data-target="order-panel-1"
                    @click.capture="toggleOrders"
                  >
                    Заказы
                  </button>
                </td>
                <td>
                  <button class="btn-reset btn btn--mini">
                    <font-awesome-icon :icon="['fas', 'xmark']" />
                  </button>
                </td>
              </tr>
              <!-- заказы -->
              <tr
                id="order-panel-1"
                class="table-order-panel"
                v-if="showOrders"
              >
                <td></td>
                <td data-label="Дата:&nbsp;">23.03.2023</td>
                <td data-label="Время:&nbsp;">Время</td>
                <td data-label="Адрес:&nbsp;">Малахова 32</td>
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
      </div>
    </div>
  </section>

  <calc-modal :is-open="isModalOpen" @close="isModalOpen = false" />
</template>

<script>
import calcModal from "./calc-modal.vue";

export default {
  name: "calc-clients",
  components: {
    calcModal,
  },
  data() {
    return {
      isModalOpen: false,
      showOrders: false,
    };
  },
  methods: {
    toggleOrders() {
      this.showOrders = !this.showOrders;
    },
  },
};
</script>

<style lang="scss" scoped>
.clients {
  &__top {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-bottom: 5px;
  }
}

table {
  table-layout: auto;
  margin: 0;
  border-collapse: collapse;
  padding: 0;
  width: 100%;

  caption {
    margin-bottom: 10px;
    font-size: 22px;

    span {
      font-size: 12px;
    }
  }

  tr {
    &:nth-child(even) {
    }
  }

  thead {
    tr {
    }
  }

  tbody tr td {
    padding: 5px;
    font-size: 14px;
    line-height: 120%;

    &:nth-child(2) {
      font-weight: 600;
    }
  }

  th,
  td {
    border: none;
    padding: 10px 5px;
    text-align: left;
  }

  th {
    border-bottom: 1px solid $border-color;
    vertical-align: bottom;
    font-weight: 500;
    font-size: 14px;
    line-height: 120%;
  }

  tr {
    &:nth-child(even) {
      border-radius: 8px;
    }
  }

  tr,
  td {
    &:nth-child(2) {
      font-weight: 400;
    }
  }

  td {
    width: 25%;

    &:last-child {
      display: flex;
      justify-content: flex-end;
      width: 50px;
      text-align: right;

      @include small-tablet {
        width: 100%;
      }
    }

    &:nth-child(1) {
      width: 60px;

      @include small-tablet {
        width: 100%;
      }
    }

    @include small-tablet {
      width: 100%;
    }
  }

  @include small-tablet {
    thead {
      position: absolute;
      overflow: hidden;
      margin: -1px;
      border: none;
      padding: 0;
      width: 1px;
      height: 1px;
      clip: rect(0 0 0 0);
    }

    tr {
      display: block;
      margin-bottom: 5px;
      border-bottom: 1px solid $border-color;
    }

    td {
      display: flex;
      justify-content: space-between;
      font-size: 16px;
      text-align: right;

      &:not(:last-child) {
        border-bottom: 0;
      }
    }

    tbody tr td {
      padding: 8px 5px;
    }

    td::before {
      content: attr(data-label);
      float: left;
      font-weight: 600;
    }

    td:last-child {
    }
  }

  @include mobile {
    tbody tr td {
      padding: 5px;
    }
  }
}

.table-order-panel {
  background-color: $light-gray-color;
}

.active {
  box-shadow: $shadow-btn--active;
}
</style>

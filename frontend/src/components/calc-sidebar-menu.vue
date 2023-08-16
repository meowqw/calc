<template>
  <div class="sidebar__menu menu">
    <ul class="list-reset menu__list">
      <li class="menu__item">
        <router-link class="menu__link" to="/" @click="closeSidebar">
          Клиенты
        </router-link>
      </li>
      <li class="menu__item">
        <router-link
          class="menu__link"
          to="/calc-library"
          @click="closeSidebar"
        >
          Калькулятор
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "calc-sidebar-menu",
  props: {
    closeSidebar: {
      type: Function,
    },
  },
};
</script>

<style lang="scss" scoped>
.menu {
  &__list {
    display: flex;
    flex-direction: column;
  }

  &__link {
    display: flex;
    align-items: center;
    border-bottom: 1px solid $border-color;
    padding: 0 20px;
    height: 55px;
    color: $dark-color;
    transition: background-color 0.05s ease-in-out;

    &:hover {
      background-color: $border-color;
    }
  }
}
</style>

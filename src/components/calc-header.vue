<template>
  <header class="header">
    <div class="container-fluid header__container">
      <button class="btn-reset sidebar-btn" @click="isSidebarOpen = true">
        <font-awesome-icon :icon="['fas', 'bars']" />
      </button>
      <div v-if="$route.path === '/'">
        <h1 class="header__title title title--h1">Список клиентов</h1>
      </div>
      <div v-if="$route.path === '/calc-library'">
        <h1 class="header__title title title--h1">Калькулятор</h1>
      </div>
    </div>
  </header>

  <calc-sidebar :is-open="isSidebarOpen" @close="isSidebarOpen = false" />
</template>

<script>
import calcSidebar from "./calc-sidebar.vue";

export default {
  name: "v-calc-header",
  data() {
    return {
      isSidebarOpen: false,
    };
  },
  components: {
    calcSidebar,
  },
};
</script>

<style lang="scss">
.header {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  min-height: 40px;

  &__container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    width: 100%;

    @include mobile {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  }

  &__title {
    font-size: 20px;
    text-align: center;

    @include mobile {
      font-size: 18px;
    }
  }

  @include tablet {
    margin-bottom: 0;
  }
}

.sidebar-btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 100%;
  height: 100%;
  max-width: 40px;
  max-height: 40px;
  font-size: 20px;
  color: $accent-color;
}
</style>

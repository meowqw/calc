<template>
  <header class="header">
    <div class="container-fluid header__container">
      <div class="header__btns">
        <button class="btn-reset header-btn" @click="openSidebar('menu')">
          <font-awesome-icon :icon="['fas', 'bars']" />
        </button>
        <button
          class="btn-reset header-btn header-btn--user"
          @click="openSidebar('user')"
        >
          <font-awesome-icon :icon="['fas', 'user-plus']" />
        </button>
      </div>
      <div v-if="$route.path === '/'">
        <h1 class="header__title title title--h1">Список клиентов</h1>
      </div>
      <div v-if="$route.path === '/calc-library'">
        <h1 class="header__title title title--h1">Калькулятор</h1>
      </div>
    </div>
  </header>

  <calc-sidebar
    :is-open="isSidebarOpen"
    :activePanel="activePanel"
    @close="closeSidebar"
  />
</template>

<script>
import calcSidebar from "./calc-sidebar.vue";

export default {
  name: "v-calc-header",
  components: {
    calcSidebar,
  },
  data() {
    return {
      isSidebarOpen: false,
      activePanel: null,
    };
  },
  methods: {
    openSidebar(panel) {
      this.isSidebarOpen = true;
      this.activePanel = panel;
    },
    closeSidebar() {
      this.isSidebarOpen = false;
      this.activePanel = null;
    },
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

  &__btns {
    display: flex;
    align-items: flex-start;

    @include mobile {
      gap: 15px;
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

.header-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  max-width: 40px;
  max-height: 40px;
  font-size: 20px;
  color: $accent-color;

  &--user {
    font-size: 18px;
  }
}
</style>

<template>
  <div :class="['sidebar', { open: isOpen }]">
    <div class="close" @click="closeSidebar"></div>
    <div class="sidebar__content">
      <div class="sidebar__top">
        <h2 class="sidebar__title">
          <template v-if="activePanel === 'menu'"> Меню </template>
          <template v-else-if="activePanel === 'user'">
            Добавление клиента
          </template>
        </h2>
        <div class="sidebar__right">
          <button
            type="button"
            class="btn-reset sidebar-btn"
            @click="closeSidebar"
          >
            <font-awesome-icon :icon="['fas', 'xmark']" />
          </button>
        </div>
      </div>
      <div class="sidebar__body">
        <template v-if="activePanel === 'menu'">
          <calc-sidebar-menu :close-sidebar="closeSidebar" />
        </template>
        <template v-else-if="activePanel === 'user'">
          <calc-add-client />
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import calcSidebarMenu from "./calc-sidebar-menu.vue";
import calcAddClient from "./calc-modal-content/calc-add-client.vue";

export default {
  name: "calc-sidebar",
  components: {
    calcSidebarMenu,
    calcAddClient,
  },
  props: {
    isOpen: {
      type: Boolean,
      default: false,
    },
    activePanel: {
      type: String,
      default: null,
    },
  },
  methods: {
    closeSidebar() {
      this.$emit("close");
    },
  },
};
</script>

<style lang="scss" scoped>
.sidebar {
  z-index: 100;
  position: fixed;
  left: -100%;
  bottom: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  transition: left 0.2s ease-in-out;

  &.open {
    left: 0;
  }

  &__content {
    z-index: 101;
    position: absolute;
    left: 0;
    top: 0;
    overflow: auto;
    border: 1px solid $border-color;
    padding: 20px 0;
    width: 100%;
    height: -webkit-fill-available;
    max-width: 320px;
    background-color: $light-gray-color;

    @include mobile {
      height: 100%;
      max-width: 100%;
    }
  }

  &__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 0 10px;
  }

  &__right {
    display: flex;
    align-items: flex-end;
  }

  &__title {
    margin: 0;
    font-weight: 500;
    font-size: 16px;
    line-height: 119%;
  }

  &--active {
    left: 0;
  }
}

.close {
  z-index: 0;
  position: relative;
  width: 100%;
  height: 100%;
}
</style>

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    // {
    //   path: "/",
    //   name: "",
    //   component:
    // },
  ],
});

export default router;

const app = createApp({});
app.use(router);

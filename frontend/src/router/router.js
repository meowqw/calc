import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import calcLibrary from "@/components/calc-library";
import calcClients from "@/components/calc-clients";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/calc-library",
      name: "calc-library",
      component: calcLibrary,
    },
    {
      path: "/",
      name: "calc-clients",
      component: calcClients,
    },
  ],
});

export default router;

const app = createApp({});
app.use(router);

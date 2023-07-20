import { createApp } from "vue";
import { createStore } from "vuex";

import commonActions from "./actions/actions";
import apiRequests from "./actions/api-requests";
import getters from "./getters/getters";
import mutations from "./mutations/mutations";

const actions = { ...commonActions, ...apiRequests };

const store = createStore({
  state: {
    // список элементов в первом калькуляторе "бурение"
    accordionListFirst: [],
     // список элементов во втором калькуляторе "периметр"
    accordionListSecond: [],
  },
  mutations,
  actions,
  getters,
});

export default store;

const app = createApp({});
app.use(store);

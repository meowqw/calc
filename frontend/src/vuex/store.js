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
    // список клиентов
    clients: [],
    // результат первого калькулятор
    resultFirstCalc: 0,
    // результат второго калькулятор
    resultSecondCalc: 0,
    // результат третьего калькулятор
    resultThirdCalc: 0,

    // коронки через API
    crowns: [],
    // материалы через API
    materials: [],
    // коэффициенты через API
    coefficients: [],
    // дополнительные работы через API
    extraWorks: [],
    // настройки
    settings: [],
  },
  mutations,
  actions,
  getters,
});

export default store;

const app = createApp({});
app.use(store);

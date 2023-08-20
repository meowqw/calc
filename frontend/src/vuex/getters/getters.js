export default {
  ACCORDION_LIST_FIRST(state) {
    return state.accordionListFirst;
  },
  ACCORDION_LIST_SECOND(state) {
    return state.accordionListSecond;
  },

  VALUE_SLIDER_FIRST_CALC(state) {
    return state.valueSliderFirstCalc;
  },

  // клиенты
  CLIENTS(state) {
    return state.clients;
  },

  // результат первого калькулятора
  GET_RESULT_FIRST_CALC(state) {
    return state.resultFirstCalc;
  },
  // результат второго калькулятора
  GET_RESULT_SECOND_CALC(state) {
    return state.resultSecondCalc;
  },
  // результат третьего калькулятора
  GET_RESULT_THIRD_CALC(state) {
    return state.resultThirdCalc;
  },

  // скидка
  GET_SALE(state) {
    return state.sale;
  },

  // коронки
  GET_CROWNS(state) {
    return state.crowns;
  },
  // коронки для второго калькулятора
  GET_CROWNS_TWO(state) {
    return state.crownsTwo;
  },
  // материалы стены
  GET_MATERIALS(state) {
    return state.materials;
  },
  // коэффициенты
  GET_COEFFICIENTS(state) {
    return state.coefficients;
  },
  // дополнительные работы
  GET_EXTRA_WORKS(state) {
    return state.extraWorks;
  },
  // получаем настройки
  GET_SETTINGS(state) {
    return state.settings;
  },
  // максимальный коэффициент
  GET_MAX_COEF(state) {
    return state.maxCoef;
  },
};

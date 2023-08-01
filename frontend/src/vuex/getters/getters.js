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

  // коронки
  GET_CROWNS(state) {
    return state.crowns;
  },
};

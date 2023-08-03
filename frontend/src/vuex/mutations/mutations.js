export default {
  // мутация добавления нового элемента в список первого калькулятора
  ADD_ITEM_FIRST_ACCORDION_LIST(state, item) {
    state.accordionListFirst.push(item);
  },
  // мутация удаления  элемента в список первого калькулятора
  REMOVE_ITEM_FIRST_ACCORDION_LIST(state, index) {
    state.accordionListFirst.splice(index, 1);
  },
  // мутация добавления нового элемента в список второго калькулятора
  ADD_ITEM_SECOND_ACCORDION_LIST(state, item) {
    state.accordionListSecond.push(item);
  },
  // мутация удаления элемента из списка второго калькулятора
  REMOVE_ITEM_SECOND_ACCORDION_LIST(state, index) {
    state.accordionListSecond.splice(index, 1);
  },

  // мутация добавления клиента
  ADD_CLIENT(state, client) {
    state.clients.push(client);
  },

  // мутация добавления данных первого калькулятора
  UPDATE_RESULT_FIRST_CALC(state, value) {
    state.resultFirstCalc = value;
  },
  // мутация добавления данных второго калькулятора
  UPDATE_RESULT_SECOND(state, value) {
    state.resultSecondCalc = value;
  },
  // мутация добавления данных третьего калькулятора
  UPDATE_RESULT_THIRD_CALC(state, value) {
    state.resultThirdCalc = value;
  },

  // обновление состояния коронок
  SET_CROWNS(state, data) {
    state.crowns = data;
  },
  // обновление состояния материалов
  SET_MATERIALS(state, data) {
    state.materials = data;
  },
  // обновление состояния коэффициентов
  SET_COEFFICIENTS(state, data) {
    state.coefficients = data;
  },
  // обновление состояния дополнительных работ
  SET_EXTRA_WORKS(state, data) {
    state.extraWorks = data;
  },

  UPDATE_QUANTITY_COUNTER_FOR_EXTRA_WORKS(state, payload) {
    const {id, value} = payload;
    state.extraWorks[id].quantity = value;
  }
};

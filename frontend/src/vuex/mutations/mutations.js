export default {
  // мутация добавления нового элемента в список первого калькулятора
  ADD_ITEM_FIRST_ACCORDION_LIST(state, item) {
    state.accordionListFirst.push(item);
  },
  // мутация удаления  элемента в список первого калькулятора
  REMOVE_ITEM_FIRST_ACCORDION_LIST(state, index) {
    delete state.firstCalcResults[index];
    state.accordionListFirst.splice(index, 1);
    state.resultFirstCalc = Object.values(state.firstCalcResults).reduce(
      (partialSum, a) => partialSum + a,
      0
    );
  },
  // мутация добавления нового элемента в список второго калькулятора
  ADD_ITEM_SECOND_ACCORDION_LIST(state, item) {
    state.accordionListSecond.push(item);
  },
  // мутация удаления элемента из списка второго калькулятора
  REMOVE_ITEM_SECOND_ACCORDION_LIST(state, index) {
    delete state.secondCalcResults[index];
    state.accordionListSecond.splice(index, 1);
    state.resultSecondCalc = Object.values(state.secondCalcResults).reduce(
      (partialSum, a) => partialSum + a,
      0
    );
  },

  // мутация добавления клиента
  ADD_CLIENT(state, client) {
    state.clients.push(client);
  },

  // мутация удаления клиента 
  SET_DELETE_CLIENT(state, id) {
    // Находим индекс клиента в массиве clients по ID
    const index = state.clients.findIndex(client => client.id === id);

    if (index !== -1) {
      // удаление клиента из массива по индексу
      state.clients.splice(index, 1);
    }
  },

  // мутация добавления данных первого калькулятора
  UPDATE_RESULT_FIRST_CALC(state, value) {
    let key = Object.keys(value)[0];
    state.firstCalcResults[key] = value[key];
    state.resultFirstCalc = Object.values(state.firstCalcResults).reduce(
      (partialSum, a) => partialSum + a,
      0
    );
  },
  // мутация добавления данных второго калькулятора
  UPDATE_RESULT_SECOND_CALC(state, value) {
    let key = Object.keys(value)[0];
    state.secondCalcResults[key] = value[key];
    state.resultSecondCalc = Object.values(state.secondCalcResults).reduce(
      (partialSum, a) => partialSum + a,
      0
    );
  },
  // мутация добавления данных третьего калькулятора
  UPDATE_RESULT_THIRD_CALC(state, value) {
    state.resultThirdCalc = value;
  },

  // обновление состояния коронок
  SET_CROWNS(state, data) {
    state.crowns = data;
  },
  // обновление состояния коронок для второго калькулятора
  SET_CROWNS_TWO(state, data) {
    state.crownsTwo = data;
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
    const { id, newQuantity } = payload;
    state.extraWorks[id].quantity = newQuantity;
  },
  // обновление состояния настроек
  SET_SETTINGS(state, data) {
    state.settings = data;
  },
  // обновление скидки
  UPDATE_SALE(state, value) {
    state.sale = value;
  },
  // обновление максимального коэффициента
  UPDATE_MAX_COEF(state, value) {
    state.maxCoef = value;
  },
  // обновление клиентов
  SET_CLIENTS(state, value) {
    state.clients = value;
  }
};

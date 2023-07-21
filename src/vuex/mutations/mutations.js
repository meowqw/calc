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
  // мутация удаления элемента в список второго калькулятора
  REMOVE_ITEM_SECOND_ACCORDION_LIST(state, index) {
    state.accordionListSecond.splice(index, 1);
  },
  // мутация значения толщины стены в первом калькуляторе
  SET_VALUE_SLIDER_FIRST_CALC(state, value) {
    state.valueSliderFirstCalc = value;
  }
};

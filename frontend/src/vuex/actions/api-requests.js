import axios from "axios";

export default {
  // получаем коронки 
  async FETCH_CROWNS({ commit }) {
    try {
      const crowns = await axios("http://37.46.134.113:2041/api/v1/crowns", {
        methods: "GET",
        headers: {},
      });

      commit("SET_CROWNS", crowns.data.data);
    } catch (error) {
      console.log(error);
    }
  },

  // получаем материалы стены
  async FETCH_MATERIALS({ commit }) {
    try {
      const materials = await axios("http://37.46.134.113:2041/api/v1/materials", {
        methods: "GET",
        headers: {},
      });

      commit("SET_MATERIALS", materials.data.data);
    } catch (error) {
      console.log(error);
    }
  },

  // получаем коэффициенты
  async FETCH_COEFFICIENTS({ commit }) {
    try {
      const coefficients = await axios("http://37.46.134.113:2041/api/v1/coefficients", {
        methods: "GET",
        headers: {},
      });

      commit("SET_COEFFICIENTS", coefficients.data.data);
    } catch (error) {
      console.log(error);
    }
  },

  async FETCH_EXTRA_WORKS({ commit }) {
    try {
      const extraWorks = await axios("http://37.46.134.113:2041/api/v1/extraWorks", {
        methods: "GET",
        headers: {},
      });

      commit("SET_EXTRA_WORKS", extraWorks.data.data);
    } catch (error) {
      console.log(error);
    }
  },
};

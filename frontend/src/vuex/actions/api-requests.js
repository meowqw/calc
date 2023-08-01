import axios from "axios";

export default {
  async FETCH_CROWNS({ commit }) {
    try {
      const crowns = await axios("http://37.46.134.113:2041/api/v1/crowns", {
        methods: "GET",
        headers: {},
      });

      commit("SET_CROWNS", crowns.data.data);

      return crowns;
    } catch (error) {
      console.log(error);
      return error;
    }
  },
};

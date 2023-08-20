import axios from "axios";

export default {
  async SUBMIT_NEW_USER({ commit }, data) {
    try {
      const response = await axios.post(
        "http://37.46.134.113:2041/api/v1/orders",
        data,
        {
          headers: {},
        }
      );

      commit("ADD_CLIENT", data);

      return console.log(response);
    } catch (error) {
      return error;
    }
  },
};

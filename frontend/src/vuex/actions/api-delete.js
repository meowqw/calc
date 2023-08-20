import axios from "axios";

export default {
  async DELETE_CLIENT({ commit }, id) {
    try {
      const response = await axios.delete(
        `http://37.46.134.113:2041/api/v1/clients/${id}`,
        {
          headers: {},
        }
      );

      commit("SET_DELETE_CLIENT", id);

      return response;
    } catch (error) {
      return error;
    }
  },
};

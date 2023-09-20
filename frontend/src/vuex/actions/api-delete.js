import axios from "axios";
import {API_URL} from "../../../config";

export default {
  async DELETE_CLIENT({ commit }, id) {
    try {
      const response = await axios.delete(
        API_URL + `/api/v1/clients/${id}`,
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

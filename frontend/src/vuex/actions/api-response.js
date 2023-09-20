import axios from "axios";
import {API_URL} from "../../../config";

export default {
  async SUBMIT_NEW_USER({ commit }, data) {
    try {
      const response = await axios.post(
        API_URL + "/api/v1/orders",
        data,
        {
          headers: {},
        }
      );

      commit("ADD_CLIENT", data);

      return console.log(response);
    } catch (error) {
      return Promise.reject(error);
    }
  },
};

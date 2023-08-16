import axios from "axios";

export default {
  async SUBMIT_NEW_USER(data) {
    try {
      const response = await axios.post("", data, {
        headers: {},
      });

      return response;
    } catch (error) {
      return error;
    }
  },
};

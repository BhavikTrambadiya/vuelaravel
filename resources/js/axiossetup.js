import axios from "axios";

axios.defaults.headers["Accept"] = "application/json";

const mainAxios = axios.create({
    baseURL: `/api/v1`,
});

export { mainAxios };

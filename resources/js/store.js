import { createStore } from "vuex";
import { userDetails } from "./composable/userapi";
export default createStore({
    state: {
        user: {},
    },
    getters: {},
    mutations: {
        async updateUser(state, payload) {
            if (payload) {
                state.user = payload;
            } else {
                await userDetails().then((response) => {
                    state.user = response.data?.data;
                });
            }
        },
    },
    actions: {},
});

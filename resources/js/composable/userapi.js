import { mainAxios } from "../axiossetup";
export function apiLogin(email, password) {
    return mainAxios.post(`login`, {
        email,
        password,
    });
}

export function apiRegister(name, email, password, password_confirmation) {
    return mainAxios.post(`register`, {
        name,
        email,
        password,
        password_confirmation,
    });
}

export function userDetails() {
    return mainAxios.get(`users/details`, {
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    });
}

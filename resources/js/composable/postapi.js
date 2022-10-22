import { mainAxios } from "../axiossetup";
export function postList(page = 1) {
    return mainAxios.get(`posts/list?page=${page}`, {
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    });
}

export function createPost(formData) {
    return mainAxios.post(`posts/create`, formData, {
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "Content-Type": "multipart/form-data",
        },
    });
}

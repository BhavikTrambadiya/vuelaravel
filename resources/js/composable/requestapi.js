import { mainAxios } from "../axiossetup";
export function requestList(page = 1) {
    return mainAxios.get(`requests/list?page=${page}`, {
        headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
        },
    });
}

export function makeRequest(points) {
    return mainAxios.post(
        `requests/make`,
        { points },
        {
            headers: {
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
        }
    );
}

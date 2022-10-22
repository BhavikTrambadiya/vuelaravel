<template>
    <div class="mt-4">
        <h5 class="fs-4 fw-bold">Total Request: {{ total }}</h5>
        <table class="table table-hover mt-4 bg-white rounded">
            <thead>
                <tr>
                    <th class="text-start">Requested Date</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-end">Approve Date</th>
                </tr>
            </thead>
            <tbody class="rounded">
                <template v-if="requests.length > 0">
                    <tr v-for="request in requests" :key="request.request_id">
                        <td class="text-start">
                            {{ request.created_at }}
                        </td>
                        <td class="text-center">
                            {{ request.points }}
                        </td>
                        <td class="text-center">
                            <status-badge :status="request.status" />
                        </td>
                        <td class="text-end">
                            {{ request.approvedate }}
                        </td>
                    </tr>
                </template>
                <template v-else>
                    <tr>
                        <td class="text-center" colspan="4">
                            No Records Found
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
        <pagination-link :pagination="pagination" />
    </div>
</template>

<script>
import PaginationLink from "../PaginationLink.vue";
import StatusBadge from "./StatusBadge.vue";
import { requestList } from "../../composable/requestapi";
export default {
    components: { PaginationLink, StatusBadge },
    data() {
        return {
            requests: [],
            total: 0,
            pagination: {
                current_page: 0,
                from: 1,
                last_page: 1,
            },
        };
    },
    mounted() {
        this.getRequests();
    },
    methods: {
        async getRequests(page = 1) {
            await requestList(page)
                .then((response) => {
                    if (response.data?.meta) {
                        this.pagination.current_page =
                            response.data?.meta.current_page;
                        this.total = response.data?.meta.total;
                        this.pagination.last_page =
                            response.data?.meta.last_page;
                    }
                    this.requests = response.data?.data;
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
};
</script>

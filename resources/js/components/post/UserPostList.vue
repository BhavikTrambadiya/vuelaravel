<template>
    <div class="mt-4">
        <h5 class="fs-4 fw-bold">Total Posts: {{ total }}</h5>
        <ul class="list-group mt-4" v-if="posts.length > 0">
            <li
                class="list-group-item d-flex justify-content-between align-items-start"
                v-for="post in posts"
                :key="post.post_id"
            >
                <span class="flex-grow-1">
                    {{ post.title }}
                </span>
                <img
                    :src="post.image"
                    height="100"
                    width="100"
                    class="img-thumbnail float-end"
                    alt=""
                />
            </li>
        </ul>
        <ul class="list-group mt-4" v-else>
            <li
                class="list-group-item d-flex justify-content-between align-items-start"
            >
                <span class="flex-grow-1"> No Records Found </span>
            </li>
        </ul>
        <pagination-link :pagination="pagination" />
    </div>
</template>

<script>
import { postList } from "../../composable/postapi";
import PaginationLink from "../PaginationLink.vue";
export default {
    components: { PaginationLink },
    data() {
        return {
            posts: [],
            total: 0,
            pagination: {
                current_page: 0,
                from: 1,
                last_page: 1,
            },
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        async getPosts(page = 1) {
            await postList(page)
                .then((response) => {
                    if (response.data?.meta) {
                        this.pagination.current_page =
                            response.data?.meta.current_page;
                        this.total = response.data?.meta.total;
                        this.pagination.last_page =
                            response.data?.meta.last_page;
                    }
                    this.posts = response.data?.data;
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
};
</script>

<style></style>

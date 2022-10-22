<template>
    <div class="btn-group mt-3" role="group" aria-label="Basic example">
        <button
            type="button"
            class="btn border-primary"
            @click="getPosts(pagination.current_page - 1)"
            :disabled="pagination.current_page == 1"
        >
            Prev
        </button>
        <button type="button" class="btn border-primary">
            {{ pagination.current_page }}
        </button>
        <button
            type="button"
            class="btn border-primary"
            @click="getPosts(pagination.current_page + 1)"
            :disabled="pagination.last_page == pagination.current_page"
        >
            Next
        </button>
    </div>
</template>

<script>
export default {
    props: {
        pagination: {
            type: Object,
            default: {
                current_page: 0,
                from: 1,
                last_page: 1,
            },
        },
    },
};
</script>

<template>
    <div class="col-md-8">
        <create-post-form @postCreated="reploadFirstPage()" />
        <user-post-list ref="postlist" />
    </div>
</template>

<script>
import CreatePostForm from "./CreatePostForm.vue";
import UserPostList from "./UserPostList.vue";
export default {
    components: { CreatePostForm, UserPostList },
    methods: {
        reploadFirstPage() {
            this.$refs.postlist.getPosts();
        },
    },
};
</script>

<style></style>

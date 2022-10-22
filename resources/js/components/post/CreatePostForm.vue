<template>
    <form class="card" @submit.prevent="postSubmit">
        <div class="alert alert-danger" v-if="message && message.length > 0">
            <p class="text-danger">{{ message }}</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <input-field-form
                        :label="'Title'"
                        :name="'title'"
                        :type="'text'"
                        :placeholder="'Enter Title'"
                        v-model="title"
                    />
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label">Image</label>
                        <input
                            class="form-control"
                            v-bind="$attrs"
                            type="file"
                            name="image"
                            ref="file"
                            v-on:change="handleFileUpload()"
                        />
                        <template
                            v-if="errors?.image && errors.image?.length > 0"
                        >
                            <p
                                class="text-danger"
                                v-for="error in errors.image"
                                :key="error"
                            >
                                {{ error }}
                            </p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>
</template>

<script>
import { createPost } from "../../composable/postapi";
import InputFieldForm from "../form/InputField.vue";
export default {
    components: { InputFieldForm },
    data() {
        return {
            title: "",
            image: "",
            message: "",
            errors: [],
        };
    },
    methods: {
        async postSubmit() {
            this.message = "";
            this.errors = [];
            let formData = new FormData();
            formData.append("image", this.image);
            formData.append("title", this.title);
            await createPost(formData)
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("postCreated");
                        this.$store.commit("updateUser");
                        this.title = "";
                        this.image = "";
                        this.$refs.file.value = null;
                    }
                })
                .catch((result) => {
                    this.errors = result.response?.data?.errors;
                    this.message = result.response?.data?.message;
                });
        },

        handleFileUpload() {
            this.image = this.$refs.file.files[0];
        },
    },
};
</script>

<style></style>

<template>
    <form class="card" @submit.prevent="requestSubmit">
        <div class="alert alert-danger" v-if="message && message.length > 0">
            <span class="text-danger">{{ message }}</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <input-field-form
                        :label="'Points'"
                        :name="'points'"
                        :type="'number'"
                        :placeholder="'Enter Points'"
                        v-model="points"
                        :errors="errors.points"
                    />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Make Request</button>
        </div>
    </form>
</template>

<script>
import InputFieldForm from "../form/InputField.vue";
import { makeRequest } from "../../composable/requestapi";
export default {
    components: { InputFieldForm },
    data() {
        return {
            points: 30,
            message: "",
            errors: [],
        };
    },
    methods: {
        async requestSubmit() {
            this.message = "";
            this.errors = [];
            await makeRequest(this.points)
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("requeastmade");
                        this.$store.commit("updateUser");
                        this.points = 30;
                    }
                })
                .catch((result) => {
                    this.errors = result.response?.data?.errors;
                    this.message = result.response?.data?.message;
                });
        },
    },
};
</script>

<style></style>

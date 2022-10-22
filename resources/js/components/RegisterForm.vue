<template>
    <form @submit.prevent="registerSubmit" class="card mt-2">
        <div class="card-header">Register</div>
        <div class="alert alert-danger" v-if="message.length > 0">
            <p class="text-danger">{{ message }}</p>
        </div>
        <div class="card-body">
            <input-field
                :label="'Name'"
                :name="'name'"
                :placeholder="'Enter Your Name'"
                :type="'text'"
                v-model="name"
                :errors="errors ? errors.name : {}"
            />
            <input-field
                :label="'Email'"
                :name="'email'"
                :placeholder="'Enter Your Email'"
                :type="'email'"
                v-model="email"
                :errors="errors ? errors.email : {}"
            />
            <input-field
                :label="'Password'"
                :name="'password'"
                :placeholder="'Enter Your Password'"
                :type="'password'"
                v-model="password"
                :errors="errors ? errors.password : {}"
            />
            <input-field
                :label="'Confirm Password'"
                :name="'password_confirmation'"
                :placeholder="'Enter Your Confirm Password'"
                :type="'password'"
                v-model="password_confirmation"
                :errors="errors ? errors.password_confirmation : {}"
            />
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</template>

<script>
import InputField from "./form/InputField.vue";
import { apiRegister } from "../composable/userapi";
export default {
    components: { InputField },
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            errors: {},
            message: "",
        };
    },
    methods: {
        registerSubmit() {
            apiRegister(
                this.name,
                this.email,
                this.password,
                this.password_confirmation
            )
                .then(async (response) => {
                    this.saveStorage(response.data?.data.access_token);
                    await this.$store.commit("updateUser", response.data?.data);
                    this.$emit("userloggedin");
                })
                .catch((result) => {
                    this.errors = result.response?.data?.errors;
                    this.message = result.response?.data?.message;
                });
        },
        saveStorage(token) {
            localStorage.setItem("token", token);
        },
    },
};
</script>

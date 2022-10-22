<template>
    <form @submit.prevent="loginSubmit" class="card mt-2">
        <div class="card-header">Login</div>
        <div class="alert alert-danger" v-if="message.length > 0">
            <p class="text-danger">{{ message }}</p>
        </div>
        <div class="card-body">
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</template>

<script>
import InputField from "./form/InputField.vue";
import { apiLogin } from "../composable/userapi";
export default {
    components: { InputField },
    data() {
        return {
            email: "",
            password: "",
            errors: {},
            message: "",
        };
    },
    methods: {
        async loginSubmit() {
            this.message = "";
            apiLogin(this.email, this.password)
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

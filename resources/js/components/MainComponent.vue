<template>
    <div class="container mt-5">
        <div v-if="Object.keys(user).length > 0" class="row">
            <profile-section @tabselected="userUpdate"></profile-section>
            <post-tab-component v-if="tab == POSTS"></post-tab-component>
            <request-tab-component
                v-if="tab == REQUESTS"
            ></request-tab-component>
        </div>
        <div v-else>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link active"
                        id="home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#home"
                        type="button"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                    >
                        Login
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#profile"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                        Register
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade show active"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab"
                >
                    <login-form></login-form>
                </div>
                <div
                    class="tab-pane fade"
                    id="profile"
                    role="tabpanel"
                    aria-labelledby="profile-tab"
                >
                    <register-form></register-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProfileSection from "./ProfileSection.vue";
import PostTabComponent from "./post/PostTabComponent.vue";
import { tabType, POSTS, REQUESTS } from "../enums/tabs";
import LoginForm from "./LoginForm.vue";
import RegisterForm from "./RegisterForm.vue";
import RequestTabComponent from "./request/RequestTabComponent.vue";
import { mapState } from "vuex";
export default {
    data() {
        return {
            tabType,
            POSTS,
            REQUESTS,
            tab: POSTS,
        };
    },
    components: {
        LoginForm,
        RegisterForm,
        ProfileSection,
        PostTabComponent,
        RequestTabComponent,
    },
    computed: {
        ...mapState(["user"]),
    },
    mounted() {
        this.$store.commit("updateUser");
    },
    methods: {
        userUpdate(value) {
            this.tab = value;
            this.$store.commit("updateUser");
        },
    },
};
</script>

<style></style>

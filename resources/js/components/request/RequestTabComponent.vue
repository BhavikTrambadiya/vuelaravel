<template>
    <div class="col-md-8">
        <create-request-form
            v-if="user.point >= 30"
            @requeastmade="reploadFirstPage()"
        ></create-request-form>
        <user-request-list ref="reqlist" />
    </div>
</template>

<script>
import { mapState } from "vuex";
import CreateRequestForm from "./CreateRequestForm.vue";
import UserRequestList from "./UserRequestList.vue";
export default {
    components: { CreateRequestForm, UserRequestList },
    computed: {
        ...mapState(["user"]),
    },
    methods: {
        reploadFirstPage() {
            this.$refs.reqlist.getRequests();
        },
    },
};
</script>

<style></style>

<template>
    <div>
        <span v-if="status == PENDING" class="badge rounded-pill bg-secondary">
            {{ status }}
        </span>
        <span
            v-else-if="status == APPROVE"
            class="badge rounded-pill bg-success"
        >
            {{ status }}
        </span>
        <span v-else class="badge rounded-pill bg-light text-dark">
            {{ status }}
        </span>
    </div>
</template>

<script>
import { PENDING, APPROVE } from "../../enums/userRequestType";
export default {
    props: {
        status: {
            type: String,
        },
    },
    data() {
        return {
            PENDING,
            APPROVE,
        };
    },
};
</script>

<style></style>

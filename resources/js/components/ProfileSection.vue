<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title fw-bold">{{ user.name }}</h5>
                        <p class="card-text">{{ user.email }}</p>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold fs-3">{{ user.point }}</div>
                        <div class="fw-bold fs-5">points</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button
                    type="button"
                    class="btn btn-primary me-2"
                    @click="$emit('tabselected', POSTS)"
                >
                    Posts
                </button>
                <button
                    type="button"
                    class="btn btn-success"
                    @click="$emit('tabselected', REQUESTS)"
                >
                    Requestes
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";
import { POSTS, REQUESTS } from "../enums/tabs";
export default {
    computed: {
        ...mapState(["user"]),
    },
    data() {
        return {
            POSTS,
            REQUESTS,
        };
    },
};
</script>

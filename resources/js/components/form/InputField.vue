<template>
    <div class="mb-3">
        <label for="title" class="form-label">{{ label }}</label>
        <input
            class="form-control"
            v-bind="$attrs"
            :type="type"
            :name="name"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <template v-if="errors.length > 0">
            <p class="text-danger" v-for="error in errors" :key="error">
                {{ error }}
            </p>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "text",
        },
        name: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        placeholder: {
            type: String,
            default: "",
        },
        modelValue: {
            type: [String, Number, File],
            default: "",
        },
        errors: {
            type: Array,
            default: [],
        },
    },
    emits: ["update:modelValue"],
};
</script>

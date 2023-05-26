<script setup>
    //Props
    const props = defineProps({ 
        type: String,
        label: String,
        field_name: String,
        form: Object,
        required: Boolean,
        autofocus: Boolean,
        disabled: Boolean,
        rows: Number
    })

</script>

<template>
    <div class="mb-5">
        <label :for="field_name" class="block mb-2 font-bold text-gray-600">
            {{ label }} <span v-if="required" class="text-red-500 font-bold">*</span>
        </label>
        <input 
            v-if="type !== 'textarea'"
            v-model="form[props.field_name]"
            :id="field_name" 
            :type="type" 
            :placeholder="label" 
            :autofocus="autofocus"
            :disabled="disabled"
            :min="type === 'number' ? 0 : null"
            :step="type === 'number' ? 1 : null"
            :class="disabled ? 'bg-gray-200' : ''"
            class="border border-gray-300 shadow p-3 w-full rounded mb-" 
        >
        <textarea
            v-if="type === 'textarea'"
            v-model="form[props.field_name]"
            :id="field_name" 
            :placeholder="label" 
            :autofocus="autofocus"
            :disabled="disabled"
            :rows="rows"
            :class="disabled ? 'bg-gray-200' : ''"
            class="border border-gray-300 shadow p-3 w-full rounded mb-" 
        >
        </textarea>
        <div v-if="form.errors[props.field_name]" class="text-red-500">
            {{ form.errors[props.field_name] }}
        </div>
    </div>
</template>
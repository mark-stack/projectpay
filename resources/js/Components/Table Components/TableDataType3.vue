<script setup>
    //Props
    defineProps({ 
        text1: String,
        success: Boolean
    })
</script>

<template>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span v-if="success == true" class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
            <span class="relative">
                {{ text1 }}
            </span>
        </span>
        <span v-if="success == false" class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
            <span class="relative">
                {{ text1 }}
            </span>
        </span>
        <span v-if="success == null" class="">
            {{ text1 }}
        </span>
    </td>
</template>

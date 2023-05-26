<script setup>
    //Props
    defineProps({ 
        text1: String
    })
</script>

<template>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ text1 }}
        </p>
    </td>
</template>

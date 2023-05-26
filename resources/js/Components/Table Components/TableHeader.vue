<script setup>
    //Props
    defineProps({ 
        text1: String
    })
</script>

<template>
    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
        {{ text1 }}
    </th>
</template>
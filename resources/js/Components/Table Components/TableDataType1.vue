<script setup>
    //Props
    defineProps({ 
        text1: String,
        text2: String
    })
</script>

<template>
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex">
            <div class="ml-3">
                <p class="text-gray-900 whitespace-no-wrap">
                    {{ text1 }}
                </p>
                <p class="text-gray-600 whitespace-no-wrap">
                    {{ text2 }}
                </p>
            </div>
        </div>
    </td>
</template>

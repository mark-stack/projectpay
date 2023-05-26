<template>
  <div v-if="links.length > 3" class="flex justify-center p-3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, k) in links" :key="k">
        <div 
          v-if="link[1] === null"  
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" 
          v-html="link[0]" 
        />
        <Link 
          v-else 
          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" 
          :class="{ 'bg-blue-700 text-white': link.active }" 
          :href="link[1]" 
          v-html="link[0]" 
          preserve-scroll
        />
      </template>
    </div>
  </div>
</template>
    
<script setup>
  //Component import
  import { Link } from '@inertiajs/vue3';

  //Props
  const props = defineProps({ 
      links: Array,
  })

</script> 
<template>
    <div class="bg-blue-100 p-3 border-l-4 border-blue-500">
        <div class="flex space-x-3">
            <div class="flex-1 leading-tight text-sm text-blue-700">
                <div v-if="line1">
                    <b>{{  line1  }}</b>
                </div>
                <div v-if="line2">
                    {{  line2  }}
                </div>
                <div v-if="line3">
                    {{  line3  }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
  //General imports
  //...

  //Component Imports
  //...

  //Composable imports
  //...
  
  //Props
  defineProps({
    line1: String,
    line2: String,
    line3: String
  })
  
  //Variables called from composables
  //...

  //Variables (may use variable from composables above)
  //...

  //onMounted (can be multiple)
  //...

</script>